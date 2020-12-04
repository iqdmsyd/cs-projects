using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using WebAPI.Repositories;
using WebAPI.Models.Referensi;
using WebAPI.Models;

namespace WebAPI.Controllers
{
    [Authorize]
    [Produces("application/json")]
    [Route("api/Referensi")]
    public class ReferensiController : Controller
    {
        RepoReferensi repo = new RepoReferensi();

        Msg post = new Msg { Pesan = "Item gagal ditambahkan." };
        Msg okPost = new Msg { Pesan = "Item berhasil ditambahkan." };

        // GET ALL REFERENSI TIAP TABEL //
        [HttpGet("Tipe")] //GetAll Tipe
        public IActionResult allTipe()
        {
            var obj = repo.GetAllTipe();
            if (obj.Count() > 0)
                return Ok(obj);
            else
                return NotFound(null);
        }

        [HttpGet("Prosesor")] //GetAll Prosesor
        public IActionResult allProsesor()
        {
            var obj = repo.GetAllProsesor();
            if (obj.Count() > 0)
                return Ok(obj);
            else
                return NotFound(null);
        }

        [HttpGet("Ram")] //GetAll Ram
        public IActionResult allRam()
        {
            var obj = repo.GetAllRam();
            if (obj.Count() > 0)
                return Ok(obj);
            else
                return NotFound(null);
        }

        [HttpGet("Tahun")] //GetAll Tahun
        public IActionResult allTahun()
        {
            var obj = repo.GetAllTahun();
            if (obj.Count() > 0)
                return Ok(obj);
            else
                return NotFound(null);
        }
        // ---------------------------- //
        
        // INSERT NEW REFS VALUE //
        [HttpPost("Tipe")]
        public IActionResult Tipe([FromBody]RefTipe item)
        {
            if (repo.addTipe(item) > 0)
            {
                return Ok(okPost);
            }
            else
            {
                return NotFound(post);
            }
        }

        [HttpPost("Prosesor")]
        public IActionResult Prosesor([FromBody]RefProsesor item)
        {
            if (repo.addProsesor(item) > 0)
            {
                return Ok(okPost);
            }
            else
            {
                return NotFound(post);
            }
        }

        [HttpPost("Ram")]
        public IActionResult Ram([FromBody]RefRam item)
        {
            if (repo.addRam(item) > 0)
            {
                return Ok(okPost);
            }
            else
            {
                return NotFound(post);
            }
        }

        [HttpPost("Tahun")]
        public IActionResult Tahun([FromBody]RefTahun item)
        {
            if (repo.addTahun(item) > 0)
            {
                return Ok(okPost);
            }
            else
            {
                return NotFound(post);
            }
        }
        // -------------------- //
    }
}