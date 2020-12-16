<?php
/**
 *
 */
class Analytics extends CI_Controller
{
    function __construct() {
        parent::__construct();
        ini_set('max_execution_time', '259200');
    }

    public function index() {
        $metadata['isAnalytics'] = TRUE;

        if(!$this->session->has_userdata('daily_sales')) {
            $daily_sales = $this->get_daily_sales(1);
            $this->record_daily_sales($daily_sales, 1);
            $this->session->set_userdata('daily_sales', array(
                'record' => $daily_sales,
                'month' => $this->get_month(1),
                'detail' => $this->get_daily_sales_detail($daily_sales)
            ));
        }
        $metadata['daily_sales'] = $this->session->userdata('daily_sales');

        if ($this->session->has_userdata('daily_sales_by_dimension'))
        $metadata['daily_sales_by_dimension'] = $this->session->userdata('daily_sales_by_dimension');

        $this->load->view('v_header', $metadata);
        $this->load->view('v_analytics_new', $metadata);
        $this->load->view('v_footer', $metadata);
    }

    public function get_daily_sales($month=0) {
        return $this->M_Manifest->getDailySales($month);
    }

    public function get_daily_sales_by($dim="", $month=0) {
        return $this->M_Manifest->getDailySalesBy($dim, $month);
    }

    public function change_month_daily_sales() {
        $month = $this->input->post('month');
        $daily_sales = $this->get_from_record_daily_sales($month);

        if ($daily_sales == NULL) {
            $daily_sales = $this->get_daily_sales($month);
            $this->record_daily_sales($daily_sales, $month);
        }

        $this->session->unset_userdata('daily_sales');
        $this->session->set_userdata('daily_sales', array(
            'record' => $daily_sales,
            'month' => $this->get_month($month),
            'detail' => $this->get_daily_sales_detail($daily_sales)
        ));

        redirect('analytics');
    }

    public function change_daily_sales_by_dimension() {
        $dim = $this->input->post('dimension');
        $month = $this->input->post('month');

        $daily_sales_by_dimension = $this->get_from_record_daily_sales_by_dimension($month, $dim);

        if ($daily_sales_by_dimension == NULL) {
            $daily_sales_by_dimension = $this->get_daily_sales_by($dim, $month);
            $this->record_daily_sales_by_dimension($daily_sales_by_dimension, $month, $dim);
        }

        $this->session->unset_userdata('daily_sales_by_dimension');
        $this->session->set_userdata('daily_sales_by_dimension', array(
            'record' => $daily_sales_by_dimension,
            'month' => $this->get_month($month),
            'dim' => $dim
        ));

        redirect('analytics');
    }


    public function record_daily_sales($record="", $month=0) {
        if(!$this->session->has_userdata('daily_sales_history')){
            $_SESSION['daily_sales_history'] = array();
        }

        $history = array(
            'month' => $month,
            'record' => $record
        );

        array_push($_SESSION['daily_sales_history'], $history);
    }

    public function get_from_record_daily_sales($month=0) {
        $record = $this->session->userdata('daily_sales_history');
        foreach ($record as $key => $value) {
            // jika nilai key 'month' sama dengan value parameter, maka ambil array recordnya
            if ($record[$key]['month'] == $month) {
                return $record[$key]['record'];
            }
        }
        return NULL;
    }

    public function record_daily_sales_by_dimension($record="", $month=0, $dim="") {
        if(!$this->session->has_userdata('daily_sales_by_dim_history')){
            $_SESSION['daily_sales_by_dim_history'] = array();
        }

        $history = array(
            'month' => $month,
            'dim' => $dim,
            'record' => $record
            // 'alias' => $this->get_alias($dim)
        );

        array_push($_SESSION['daily_sales_by_dim_history'], $history);
    }

    public function get_from_record_daily_sales_by_dimension($month=0, $dim="") {
        $record = $this->session->userdata('daily_sales_by_dim_history');
        foreach ($record as $key => $value) {
            // jika nilai key 'month' dan key 'key' sama dengan value parameter, maka ambil array recordnya
            if ($record[$key]['month'] == $month && $record[$key]['dim'] == $dim) {
                return $record[$key]['record'];
            }
        }
        return NULL;
    }


    public function get_daily_sales_detail($record) {
        $adult = 0; $infant = 0;
        foreach ($record as $val) {
            $adult += $val->ADULT;
            $infant += $val->INFANT;
        }
        $adult_p = round($adult/($adult + $infant)*100, 2);
        $infant_p = round($infant/($adult + $infant)*100, 2);
        $detail = array(
            'adult' => $adult,
            'infant' => $infant,
            'adult_p' => $adult_p,
            'infant_p' => $infant_p
        );
        return $detail;
    }


    public function get_json_daily_sales() {
        $daily_sales = $this->session->userdata('daily_sales');
        echo json_encode($daily_sales['record']);
    }

    public function get_json_daily_sales_detail() {
        $data = array();
        array_push($data,array(
            'type' => 'Adult',
            'sales' => $this->session->daily_sales['detail']['adult'],
        ));
        array_push($data,array(
            'type' => 'Infant',
            'sales' => $this->session->daily_sales['detail']['infant'])
        );
        // print_r($data);
        echo json_encode($data);
    }

    public function get_json_daily_sales_by_dimension() {
        $daily_sales_by_dimension = $this->session->userdata('daily_sales_by_dimension');
        echo json_encode($daily_sales_by_dimension['record']);
    }

    public function get_month($num=0) {
        $month = "";
        switch ($num) {
            case 1:
            $month = "January";
            break;
            case 2:
            $month = "February";
            break;
            case 3:
            $month = "March";
            break;
            case 4:
            $month = "April";
            break;
            case 5:
            $month = "May";
            break;
            case 6:
            $month = "June";
            break;
            case 7:
            $month = "July";
            break;
            case 8:
            $month = "August";
            break;
            case 9:
            $month = "September";
            break;
            case 10:
            $month = "October";
            break;
            case 11:
            $month = "November";
            break;
            case 12:
            $month = "December";
            break;
            default:
            // code...
            break;
        }
        return $month;
    }

    public function cek_record() {
        $record = $this->session->userdata('daily_sales_history');
        print_r($record);
        echo "<br>";

        print_r(array_keys($record[0]));
        echo "<br>";

        foreach ($record as $key => $value) {
            echo $record[$key]['month'];
            echo "<br>";
            print_r($record[$key]['record']);
        }
    }

    public function cek_record_dim() {
        $record = $this->session->userdata('daily_sales_by_dim_history');
        // print_r($record);
        foreach ($record as $key => $value) {
            // jika nilai key 'month' dan key 'key' sama dengan value parameter, maka ambil array recordnya
            if ($record[$key]['month'] == 1 && $record[$key]['dim'] == 'STSN_JUAL') {
                // return $record[$key]['record'];
                echo "ketemu<br>";
                print_r($record[$key]['record']);
            }
        }
    }

    // public function get_alias($dim="") {
    //     $alias="";
    //     switch ($dim) {
    //         case 'STSN_JUAL':
    //             // code...
    //             break;
    //
    //         default:
    //             // code...
    //             break;
    //     }
    // }

}

// public function change_dailysales_partner() {
//     $month = $this->input->post('month');
//     $this->session->unset_userdata('sales_dailyby_partner');
//     $this->session->set_userdata('sales_dailyby_partner', $this->getsales_dailyby('STSN_JUAL', $month));
//     $this->session->set_userdata('sales_dailyby_partner_month', $this->getMonth($month));
//     redirect('analytics');
// }
