using System;
using System.Collections.Generic;
using System.IO;
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
    [Route("api/Barang")]
    public class BarangController : Controller
    {
        RepoBarang repo = new RepoBarang();
        Msg get = new Msg { Pesan = "Item tidak ditemukan." };
        Msg post = new Msg { Pesan = "Item gagal ditambahkan." };
        Msg put = new Msg { Pesan = "Item gagal diupdate." };
        Msg del = new Msg { Pesan = "Item gagal dihapus." };
        Msg okPost = new Msg { Pesan = "Item berhasil ditambahkan." };
        Msg okPut = new Msg { Pesan = "Item berhasil diupdate." };
        Msg okDel = new Msg { Pesan = "Item berhasil dihapus." };

        // --- CRUD Barang --- //
        [HttpGet("GetAll")] //Get All barang
        public IActionResult getAll()
        {
            var obj = repo.GetAll();
            if (obj.Count() > 0)
                return Ok(obj);
            else
                return NotFound(null);
        }

        [HttpGet("GetByID/{arg}")] //Get barang by ID
        public IActionResult getByID(int arg)
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

        [HttpGet("GetDictionary")] //Get dictionary barang
        public IActionResult getDictionary()
        {
            try
            {
                return Ok(repo.GetDictionary());
            }
            catch (Exception)
            {
                return NotFound(null);
            }
        }

        [HttpPost] //Tambah barang
        public IActionResult Post([FromBody]Barang item)
        {
            try
            {
                repo.Insert(item);
                return Ok(okPost);
            }
            catch (Exception)
            {
                return NotFound(post);
            }
        }

        [HttpPut("{id}")] //Edit barang
        public IActionResult Put(int id, [FromBody]Barang item)
        {
            if (repo.Update(id, item) > 0)
                return Ok(okPut);
            else
                return NotFound(put);
        }

        [HttpDelete("{id}")] //Hapus barang
        public IActionResult Delete(int id)
        {
            if (repo.Delete(id) > 0)
                return Ok(okDel);
            else
                return NotFound(del);
        }

        [HttpPost("PostImage")]
        public async Task<IActionResult> UploadFile(IFormFile file)
        {
            if (file == null || file.Length == 0)
                return Content("file not selected");

            var path = Path.Combine(
                        Directory.GetCurrentDirectory(), "wwwroot", 
                        file.FileName);

            using (var stream = new FileStream(path, FileMode.Create))
            {
                await file.CopyToAsync(stream);
            }

            return RedirectToAction("Files");
        }
        // ------------------ //


        // --- CRUD DetilBarang --- //
        [HttpGet("GetAllDetil")] //Get All detil barang
        public IActionResult getAllDetil()
        {
            var obj = repo.GetAllDetilBarang();
            if (obj != null)
                return Ok(obj);
            else
                return NotFound(null);
        }

        [HttpGet("GetDetil/{arg1}/{arg2}")] //Get detil barang by ID Barang dan qty
        public IActionResult getDetilByID(int arg1, int arg2)
        {
            var temp = repo.GetPesanan(arg1, arg2);
            if (temp.Count() > 0)
                return Ok(temp);
            else
                return NotFound(null);
        }

        [HttpGet("GetDetilByID/{arg}")] //Get detil barang by ID Barang
        public IActionResult getDetilByID(int arg)
        {
            var temp = repo.GetDetilByID(arg);
            if (temp.Count() > 0)
                return Ok(temp);
            else
                return NotFound(null);
        }

        [HttpPost("AddStok")] //Tambah stok barang
        public IActionResult Post([FromBody]DetilBarang item)
        {
            if (repo.AddStok(item) > 0)
            {
                return Ok(okPost);
            }
            return NotFound(post);
        }

        [HttpDelete("DelStok/{arg1}/{arg2}")] //Kurangi stok barang
        public IActionResult Delete(int arg1, int arg2)
        {
            if (repo.DeleteStok(arg1, arg2) > 0)
                return Ok(okDel);
            else
                return NotFound(del);
        }

        //[HttpDelete("DelStok/{arg1}/{arg2}")] //Kurangi stok barang sejumlah
        // ------------------------ //


        // --- Fitur Filter Barang --- //
        [HttpGet("GetBy/{arg}")] //Urutkan barang (Termurah, Termahal, Terbaru, Terlama)
        public IActionResult GetBy(string arg)
        {
            var temp = repo.OrderBy(arg);
            if (temp.Count > 0)
                return Ok(temp);
            else
                return NotFound(null);
        }

        [HttpGet("GetFilter/{arg1}/{arg2}/{arg3}/{arg4}/{arg5}")] //Filter barang berdasarkan hargamin, hargamax, tahun, tipe lalu urutkan
        public IActionResult GetFilter(int arg1, int arg2, string arg3, string arg4, string arg5)
        {
            var temp = repo.GetFilter(arg1, arg2, arg3, arg4, arg5);
            if (temp.Count > 0)
                return Ok(temp);
            else
                return NotFound(null);
        }

        [HttpGet("GetSearch/{arg1}/{arg2}/{arg3}/{arg4}/{arg5}/{arg6}/{arg7}/{arg8}/{arg9}/{arg10}/{arg11}")]
        public IActionResult GetSearch(int arg1, string arg2, string arg3, string arg4, string arg5, int arg6, int arg7, int arg8, int arg9, string arg10, string arg11)
        {
            var temp = repo.GetSearch(arg1, arg2, arg3, arg4, arg5, arg6, arg7, arg8, arg9, arg10, arg11);
            if (temp.Count > 0)
                return Ok(temp);
            else
                return NotFound(null);
        }

        //[HttpGet("GetByHarga/{arg}/{arg2}")] //Filter barang berdasarkan harga
        //public IActionResult GetByHarga(int arg, int arg2)
        //{
        //    var temp = repo.GetByHarga(arg, arg2);
        //    if (temp.Count > 0)
        //        return Ok(temp);
        //    else
        //        return NotFound(null);
        //}

        //[HttpGet("GetByTipe/{arg}")] //Filter barang berdasarkan tipe
        //public IActionResult GetByTipe(string arg)
        //{
        //    try
        //    {
        //        return Ok(repo.GetByTipe(arg));
        //    }
        //    catch (Exception)
        //    {
        //        return NotFound(null);
        //    }
        //}

        //[HttpGet("GetByTahun/{arg}")] //Filter barang berdasarkan tahun
        //public IActionResult GetByTahun(string arg)
        //{
        //    var temp = repo.GetByTahun(arg);
        //    if (temp.Count() > 0)
        //        return Ok(temp);
        //    else
        //        return NotFound(null);
        //}

        //[HttpGet("GetByStok/{arg1}/{arg2}")] //Filter barang berdasarkan stok -> admin saja
        //public IActionResult GetByStok(int arg1, int arg2)
        //{
        //    var temp = repo.GetByStok(arg1, arg2);
        //    if (temp.Count > 0)
        //        return Ok(temp);
        //    else
        //        return NotFound(null);
        //}

        [HttpGet("GetBySpek/{arg}")] //Filter berdasarkan spesifikasi
        public IActionResult GetBySpek(string arg)
        {
            var temp = repo.GetBySpek(arg);
            if (temp.Count() > 0)
                return Ok(temp);
            else
                return NotFound(null);
        }
        // -------------------------- //
    }
}