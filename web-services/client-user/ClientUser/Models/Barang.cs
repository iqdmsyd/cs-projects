using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ClientUser.Models
{
    public class Barang
    {
        public int ID { get; set; }
        public string NamaBarang { get; set; }
        public int ID_Tipe { get; set; }
        public int ID_Prosesor { get; set; }
        public int ID_Ram { get; set; }
        public int ID_Tahun { get; set; }
        public int Stok { get; set; }
        public string Deskripsi { get; set; }
        public string ImgUrl { get; set; }
        public int HargaJual { get; set; }
    }
}
