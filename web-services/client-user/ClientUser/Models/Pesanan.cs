using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ClientUser.Models
{
    public class Pesanan
    {
        private int _idBarang;
        private string _namaBarang;
        private int _harga;
        private int _qty;
        private int _total;

        public int IdBarang { get => _idBarang; set => _idBarang = value; }
        public string NamaBarang { get => _namaBarang; set => _namaBarang = value; }
        public int Harga { get => _harga; set => _harga = value; }
        public int Qty { get => _qty; set => _qty = value; }
        public int Total { get => _total; set => _total = value; }
    }

    public class ListPesanan
    {
        private List<Pesanan> _detail;

        public List<Pesanan> Detail { get => _detail; set => _detail = value; }

        public ListPesanan()
        {
            _detail = new List<Pesanan>();
        }
    }
}
