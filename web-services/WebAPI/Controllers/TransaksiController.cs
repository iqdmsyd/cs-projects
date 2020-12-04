using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using WebAPI.Models;
using WebAPI.Repositories;

namespace WebAPI.Controllers
{
    [Authorize]
    [Produces("application/json")]
    [Route("api/Transaksi")]
    public class TransaksiController : Controller
    {
        RepoTransaksi repo = new RepoTransaksi();
        Msg success = new Msg { Pesan = "Selamat, proses berhasil." };
        Msg failed = new Msg { Pesan = "Maaf, proses gagal." };

        //--- CRUD TRANSAKSI ---//
        [HttpPost] //Tambah transaksi
        public IActionResult AddTransaction([FromBody]Transaksi item)
        {
            try
            {
                repo.Insert(item);
                return Ok();
            }
            catch (Exception)
            {
                return NoContent();
            }
        }

        [HttpGet("GetAll")] //Get all transaksi
        public IActionResult GetAll()
        {
            var obj = repo.GetAll();
            if (obj.Count > 0)
                return Ok(obj);
            else
                return NotFound(null);
        }

        [HttpGet("GetByID/{arg}")] //Get transaksi by ID
        public IActionResult GetByID(int arg)
        {
            try
            {
                return Ok(repo.GetByID(arg));
            }
            catch (Exception)
            {
                return NotFound(null);
            }
        }

        [HttpGet("GetByGrosirNew/{arg}")] //Get transaksi by ID Grosir dengan tanggal terbaru
        public IActionResult GetByGrosirNew(int arg)
        {
            try
            {
                return Ok(repo.GetByGrosirNew(arg));
            }
            catch (Exception)
            {
                return NotFound(null);
            }
        }

        [HttpGet("GetByIDGrosir/{arg}")] //Get transaksi by ID Grosir
        public IActionResult GetByIDGrosir(int arg)
        {
            try
            {
                return Ok(repo.GetByIDGrosir(arg));
            }
            catch (Exception)
            {
                return NotFound(null);
            }
        }

        [HttpGet("GetByHarga/{arg1}/{arg2}")] //Get transaksi by totalBayar
        public IActionResult GetByHarga(int arg1, int arg2)
        {
            try
            {
                return Ok(repo.GetByHarga(arg1, arg2));
            }
            catch (Exception)
            {
                return NotFound(null);
            }
        }

        [HttpGet("GetByQty/{arg1}/{arg2}")] //Get transaksi by Qty
        public IActionResult GetByQty(int arg1, int arg2)
        {
            try
            {
                return Ok(repo.GetByQty(arg1, arg2));
            }
            catch (Exception)
            {
                return NotFound(null);
            }
        }

        [HttpGet("GetByTanggal/{arg1}/{arg2}")] //Get transaksi by Tanggal *masih bug*
        public IActionResult GetByTanggal(DateTime arg1, DateTime arg2)
        {
            try
            {
                return Ok(repo.GetByTanggal(arg1, arg2));
            }
            catch (Exception)
            {
                return NotFound(null);
            }
        }

        [HttpGet("GetBy/{arg1}/{arg2}")] //Get transaksi sort by Termurah, Termahal, Tersedikit, Terbanyak, Terbaru, Terlama
        public IActionResult GetBy(int arg1, string arg2)
        {
            var obj = repo.GetBy(arg1, arg2);
            if (obj.Count > 0)
                return Ok(obj);
            else
                return NotFound(null);
        }
        //---------------------//


        //--- CRUD DETIL TRANSAKSI ---//
        [HttpPost("Detil/{arg}")] //Tambah detil transaksi
        public IActionResult AddDetil(int arg, [FromBody]List<DetilTransaksi> item)
        {
            try
            {
                repo.InsertDetil(arg, item);
                return Ok(success);
            }
            catch (Exception)
            {
                return NotFound(failed);
            }
        }

        [HttpGet("AllDetil")] //Get all detil
        public IActionResult GetAllDetil()
        {
            var obj = repo.GetAllDetil();
            if (obj.Count > 0)
                return Ok(obj);
            else
                return NotFound(null);
        }

        [HttpGet("DetilByIDTransaksi/{arg}")] //Get detil by id transaksi
        public IActionResult DetilByIDTransaksi(int arg)
        {
            var obj = repo.DetilByIDTransaksi(arg);
            if (obj.Count > 0)
                return Ok(obj);
            else
                return NotFound(null);
        }

        [HttpGet("DetilByGrosirNew/{arg}")] //Get detil by ID Grosir terbaru
        public IActionResult DetilByGrosirNew(int arg)
        {
            try
            {
                return Ok(repo.GetByGrosirNew(arg));
            }
            catch (Exception)
            {
                return NotFound(null);
            }
        }
        //----------------------------//

    }
}