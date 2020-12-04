using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace WebAPI.Models
{
    public class Barang
    {
        public int ID { get; set; }
        public string NamaBarang { get; set; }
        public string Tipe { get; set; }
        public string Prosesor { get; set; }
        public string Ram { get; set; }
        public int Tahun { get; set; }
        public int Stok { get; set; }
        public string Deskripsi { get; set; }
        public string ImgUrl { get; set; }
        public int HargaJual { get; set; }
    }
}
