using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ClientUser.Models
{
    public class Transaksi
    {
        public int ID { get; set; }
        public int ID_Grosir { get; set; }
        public DateTime TanggalTransaksi { get; set; }
        public int Qty { get; set; }
        public int TotalBayar { get; set; }
    }
}
