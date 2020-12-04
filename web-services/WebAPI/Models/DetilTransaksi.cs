using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace WebAPI.Models
{
    public class DetilTransaksi
    {
        public int ID { get; set; }
        public int ID_Transaksi { get; set; }
        public int ID_Barang { get; set; }
        public string NoSeri { get; set; }
        public int HargaJual { get; set; }
    }
}
