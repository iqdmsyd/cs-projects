<?php
/**
 *
 */
class Import extends CI_Controller
{
    function __construct() {
        parent::__construct();
    }

    public function index(){

        if($this->session->has_userdata('import_success_msg')){
            $metadata['import_success_msg'] = $this->session->userdata('import_success_msg');
            // echo $metadata['import_success_msg'];
            $this->session->unset_userdata('import_success_msg');
        }

        if($this->session->has_userdata('import_error_msg')){
            $metadata['import_error_msg'] = $this->session->userdata('import_error_msg');
            // echo $metadata['import_error_msg'];
            $this->session->unset_userdata('import_error_msg');
        }

        $metadata['isImport'] = TRUE;

        $this->load->view('v_header', $metadata);
        $this->load->view('v_import', $metadata);
        $this->load->view('v_footer', $metadata);

    }

    public function tryimport(){
        if (isset($_POST['importSubmit'])) {
            ini_set('post_max_size', '200M');
            ini_set('upload_max_filesize', '200M');
            ini_set('memory_limit', '300M');
            ini_set('max_execution_time', '259200');
            ini_set('max_input_time', '259200');
            ini_set('session.gc_maxlifetime', '1200');

            $total = count($_FILES['file']['name']);
            $table_name = $_POST['table_name'];
            $file_size = 0; $i;

            for($i=0; $i<$total; $i++) {
                $file_size += $_FILES['file']['size'][$i];
            }

            // echo $file_size;

            for ($i=0; $i < $total; $i++) {
                $file = $_FILES['file']['tmp_name'][$i];
                // Mendapatkan ekstensi file csv yang akan diimport
                $ekstensi = explode('.', $_FILES['file']['name'][$i]);

                if (empty($file)) {
                    $arrMsg = ['import_error_msg' => 'File kosong.'];
                    $this->session->set_userdata($arrMsg);
                }
                else{
                    if (strtolower(end($ekstensi)) === 'csv' && $_FILES["file"]["size"][$i] > 0) {

                        $requiredHeaders = array('NO KERETA', 'KODE PEMESANAN', 'NO TIKET', 'KERETA', 'DEWASA', 'ANAK', 'INFANT', 'KLS', 'PNP', 'NO KURSI', 'RUTE', 'NAMA', 'NO IDENTITAS', 'STSN JUAL', 'STSN BOARDING', 'JAM BOARDING', 'NOTES');

                        $j = 0;
                        $handle = fopen($file, "r");
                        $firstLine = fgets($handle); //get first line of csv file
                        $foundHeaders = str_getcsv(trim($firstLine), ',', '"'); //parse to array

                        if ($foundHeaders !== $requiredHeaders) {
                            $arrMsg = ['import_error_msg' => 'File headers doesn`t match the table headers.'];
                            $this->session->set_userdata($arrMsg);
                            redirect('import');
                            // echo "Tidak cocok";
                        }

                        if ($table_name == "t_manifest") {


                            while(($row = fgetcsv($handle, 2048))) {
                                $j++;
                                if ($j == 1) continue;
                                // Data yang akan disimpan ke dalam database
                                $data = [
                                'NO_KERETA' => $row[0],
                                'KODE_PEMESANAN' => $row[1],
                                'NO_TIKET' => $row[2],
                                'KERETA' => $row[3],
                                'DEWASA' => $row[4],
                                'ANAK' => $row[5],
                                'INFANT' => $row[6],
                                'KLS' => $row[7],
                                'PNP' => $row[8],
                                'NO_KURSI' => $row[9],
                                'RUTE' => $row[10],
                                'NAMA' => $row[11],
                                'NO_IDENTITAS' => $row[12],
                                'STSN_JUAL' => $row[13],
                                'STSN_BOARDING' => $row[14],
                                'JAM_BOARDING' => $row[15]
                                // 'NOTES' => $row[17]
                                ];
                                $this->M_Manifest->insert($data);
                            }
                        }

                        if ($table_name == "Example"){
                            while(($row = fgetcsv($handle, 2048))) {
                                $j++;
                                if ($j == 1) continue;
                                // Data yang akan disimpan ke dalam database
                                $data = [
                                'NO_KERETA' => $row[1],
                                'KODE_PEMESANAN' => $row[2],
                                'NO_TIKET' => $row[3],
                                'KERETA' => $row[4],
                                'DEWASA' => $row[5],
                                'ANAK' => $row[6],
                                'INFANT' => $row[7],
                                'KLS' => $row[8],
                                'PNP' => $row[9],
                                'NO_KURSI' => $row[10],
                                'RUTE' => $row[11],
                                'NAMA' => $row[12],
                                'NO_IDENTITAS' => $row[13],
                                'STSN_JUAL' => $row[14],
                                'STSN_BOARDING' => $row[15],
                                'JAM_BOARDING' => $row[16]
                                // 'NOTES' => $row[17]
                                ];
                                $this->M_Manifest->insert($data);
                            }
                        }

                        fclose($handle);
                        $arrMsg = ['import_success_msg' => $total .' data files have been successfully imported.'];
                        $this->session->set_userdata($arrMsg);
                    }
                    else {
                        $arrMsg = ['import_error_msg' => 'Data failed to import.'];
                        $this->session->set_userdata($arrMsg);
                    }
                }
            }
        }
        redirect('import');
    }
}
