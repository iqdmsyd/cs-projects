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
    [Route("api/Dictionary")]
    public class DictionaryController : Controller
    {
        RepoDictionary repo = new RepoDictionary();

        [HttpGet("Barang")]
        public IActionResult Barang()
        {
            return Ok(repo.Barang());
        }

        [HttpGet("Transaksi")]
        public IActionResult Transaksi()
        {
            return Ok(repo.Transaksi());
        }

        [HttpGet("DetilBarang")]
        public IActionResult DetilBarang()
        {
            return Ok(repo.DetilBarang());
        }

        [HttpGet("DetilTransaksi")]
        public IActionResult DetilTransaksi()
        {
            return Ok(repo.DetilTransaksi());
        }
    }
}