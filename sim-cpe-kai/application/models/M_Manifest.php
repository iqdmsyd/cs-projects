<?php
/**
 *
 */
class M_Manifest extends CI_Model
{

    function __construct()
    {
        // Table's name
        $this->table = 't_manifest';
        // Table's primary key
        $this->primaryKey = 'ID_MANIFEST';
        // Table's column array
        $this->columns = array(
          array( 'db' => 'ID_MANIFEST',       'dt' => 0 ),
          array( 'db' => 'NO_KERETA',         'dt' => 1 ),
          array( 'db' => 'KODE_PEMESANAN',    'dt' => 2 ),
          array( 'db' => 'NO_TIKET',          'dt' => 3 ),
          array( 'db' => 'KERETA',            'dt' => 4 ),
          array( 'db' => 'DEWASA',            'dt' => 5 ),
          array( 'db' => 'ANAK',              'dt' => 6 ),
          array( 'db' => 'INFANT',            'dt' => 7 ),
          array( 'db' => 'KLS',               'dt' => 8 ),
          array( 'db' => 'PNP',               'dt' => 9 ),
          array( 'db' => 'NO_KURSI',          'dt' => 10 ),
          array( 'db' => 'RUTE',              'dt' => 11 ),
          array( 'db' => 'NAMA',              'dt' => 12 ),
          array( 'db' => 'NO_IDENTITAS',      'dt' => 13 ),
          array( 'db' => 'STSN_JUAL',         'dt' => 14 ),
          array( 'db' => 'STSN_BOARDING',     'dt' => 15 ),
          array( 'db' => 'JAM_BOARDING',      'dt' => 16 ),
          array( 'db' => 'NOTES',             'dt' => 17 )
        );

        // SQL server connection information
        $this->sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
    }

    /*
    * Insert members data into the database
    * @param $data data to be insert based on the passed parameters
    */
    public function insert($data = array()) {
        if(!empty($data)){
            // Insert member data
            $insert = $this->db->insert($this->table, $data);

            // Return the status
            return $insert?$this->db->insert_id():false;
        }
        return false;
    }

    public function getAllSales($month) {
        $this->db->select("COUNT(*) AS SALES");
        $this->db->from($this->table);
        return $this->db->get()->result();
    }

    public function countRows() {
        return $this->db->get($this->table)->num_rows();
    }

    // ANALYTICS PAGE
    public function getDailySales($month) {
        $this->db->select("DATE_FORMAT(STR_TO_DATE(JAM_BOARDING,'%d-%b-%y'),'%Y-%m-%d') AS NICEDATE, COUNT(*) AS SALES, SUM(DEWASA) AS ADULT, SUM(INFANT) AS INFANT");
        $this->db->from($this->table);
        $this->db->where("MONTH(STR_TO_DATE(JAM_BOARDING, '%d-%b-%y')) = ". $month);
        $this->db->group_by("NICEDATE");
        $this->db->order_by("NICEDATE", "ASC");
        return $this->db->get()->result();
    }

    public function getDailySalesBy($column, $month) {
        $alias = "";
        switch ($column) {
            case 'STSN_JUAL':
                $alias = "PARTNER";
                break;
            case 'RUTE':
                $alias = "ROUTE";
                break;
            case 'PNP':
                $alias = "PASSENGER";
                break;
            case 'KERETA':
                $alias = "SUBCLASS";
                break;
            case 'NO_KERETA':
                $alias = "NO KERETA";
                break;
            default:
                // code...
                break;
        }

        $query = "SET @TOTAL = 0;";
        $this->db->query($query);
        $this->db->select($column . " AS DIM, COUNT(*) AS SALES, TRUNCATE(COUNT(*)/@TOTAL*100,2) AS PERCENTAGE");
        $this->db->from("(
                    	SELECT ". $column .", @TOTAL := @TOTAL + 1
                    	FROM t_manifest
                    	WHERE MONTH(STR_TO_DATE(JAM_BOARDING, '%d-%b-%y')) = ". $month ."
                    	) TEMP");
        $this->db->group_by($column);
        $this->db->order_by("SALES","DESC");
        $this->db->limit(10);
        return $this->db->get()->result();
    }

    // public function getSalesDaily($column, $month) {
    //     $measure = "";
    //     switch ($column) {
    //         case 'DEWASA':
    //             $measure = "SUM(". $column .")";
    //             break;
    //         case 'INFANT':
    //             $measure = "SUM(". $column .")";
    //             break;
    //         default:
    //             $measure = "COUNT(*)";
    //             break;
    //     }
    //
    //     $this->db->select("DATE_FORMAT(STR_TO_DATE(JAM_BOARDING,'%d-%b-%y'),'%Y-%m-%d') AS NICEDATE, ". $measure ." AS SALES");
    //     $this->db->from($this->table);
    //     $this->db->where("MONTH(STR_TO_DATE(JAM_BOARDING, '%d-%b-%y')) = ". $month);
    //     $this->db->group_by("NICEDATE");
    //     $this->db->order_by("NICEDATE", "ASC");
    //     return $this->db->get()->result();
    // }
}

 ?>
