using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace MasterCoreMVC.Models
{
    public class AppUser
    {
        public int id { get; set; }
        public string username { get; set; }
        public string password { get; set; }
        public string name { get; set; }
        public string roles { get; set; }
        public bool isactive { get; set; }
        public DateTime? create_at { get; set; }
        public DateTime? create_date { get; set; }
        public DateTime? update_at { get; set; }
        public DateTime? update_date { get; set; }

        public virtual ICollection<string> rolelist { 
            get {
                return roles.Split(",").ToList<string>() ?? new List<string>();
            }
        }

    }
}