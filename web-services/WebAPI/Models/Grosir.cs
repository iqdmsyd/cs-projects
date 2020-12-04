using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace WebAPI.Models
{
    public class Grosir
    {
        public int ID { get; set; }
        public string NamaGrosir { get; set; }
        public string Alamat { get; set; }
        public string NamaPemilik { get; set; }
        public string Email { get; set; }
        public string Password { get; set; }
        public string NoTelp { get; set; }
    }
}
