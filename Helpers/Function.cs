using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Threading.Tasks;
using MasterCoreMVC.Data;
using Microsoft.AspNetCore.Html;
using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.Data.SqlClient;
using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Configuration;

namespace MasterCoreMVC.Helpers
{
    public static class Function
    {
        private static Random random = new Random();

        public static string RandomString(int length)
        {
            const string chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            return new string(Enumerable.Repeat(chars, length)
                .Select(s => s[random.Next(s.Length)]).ToArray());
        }

        public static IHtmlContent HelloWorldHTMLString(this IHtmlHelper htmlHelper){
            return new HtmlString("<strong>Hello World</strong>");
        }

        public static IHtmlContent InputCustom(this IHtmlHelper htmlHelper){
            return new HtmlString("<strong>Hello World</strong>");
        }
    }
}