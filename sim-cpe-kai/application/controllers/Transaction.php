
<?php
/**
 *
 */
class Transaction extends CI_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->helper('ssp.class_helper.php');
  }

  public function index()
  {
	    $metadata['isTransaction'] = TRUE;
        $metadata['allfields'] = $this->db->list_fields('t_manifest');
        $metadata['fields'] = $this->db->list_fields('t_manifest');

        $this->load->view('v_header', $metadata);
        $this->load->view('v_transaction', $metadata);
        $this->load->view('v_footer', $metadata);
  }

  public function custom()
  {
    if (!empty($_POST)) {
      $fields = $this->input->post('fields');

      $metadata['isTransaction'] = TRUE;
      $select = implode(",", $fields);

      if ($this->input->post('agg') != '') {
        $agg = $this->input->post('agg');
        $aggfield = $this->input->post('agg-field');
        $select .= ", ";
        $select .= $agg;
        $select .= "($aggfield)";
      }

      if ($this->input->post('sort') != '') {
        $sort = $this->input->post('agg');
        $sortfiled = $this->input->post('sort-field');
        // echo $sort + " " + $sortfiled;
      }
      else {
        $sort = NULL;
        $sortfiled = NULL;
      }

      $metadata['manifest'] = $this->M_Manifest->getCustom($select);
      $metadata['allfields'] = $this->db->list_fields('t_manifest');
      $metadata['fields'] = $fields;
      $this->session->set_userdata('manifest', $metadata['manifest']);

      $this->load->view('v_header', $metadata);
      $this->load->view('v_transaction', $metadata);
      $this->load->view('v_footer', $metadata);
    }
  }

  public function exportCsv()
  {
    $delimiter = ",";
    $filename = "manifest_" . date('Y-m-d') . ".csv";
    $manifest = json_decode(json_encode($this->session->userdata('manifest')), true);
    $fieldset = json_decode(json_encode($this->db->list_fields('t_manifest')), true);

    // print_r($manifest);
    // echo "<br>";
    // print_r($fieldset);

    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    fputcsv($f, $fieldset, $delimiter);

    //output each row of the data, format line as csv and write to file pointer
    foreach ($manifest as $data) {
      $lineData = array(
        $data['ID_MANIFEST'],
        $data['NO_KERETA'],
        $data['KODE_PEMESANAN'],
        $data['NO_TIKET'],
        $data['KERETA'],
        $data['DEWASA'],
        $data['ANAK'],
        $data['INFANT'],
        $data['KLS'],
        $data['PNP'],
        $data['NAMA'],
        $data['NO_IDENTITAS'],
        $data['STSN_JUAL'],
        $data['STSN_BOARDING'],
        $data['JAM_BOARDING'],
        $data['NOTES']
       );
       fputcsv($f, $lineData, $delimiter);
    }

    //move back to beginning of file
    fseek($f, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
  }

  public function getManifest()
  {
  	echo json_encode(
      SSP::simple( $_GET, $this->M_Manifest->sql_details, $this->M_Manifest->table, $this->M_Manifest->primaryKey, $this->M_Manifest->columns)
    );
  }

}
