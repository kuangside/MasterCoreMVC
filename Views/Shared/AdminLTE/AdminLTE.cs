using System;
using System.Collections.Generic;

namespace MasterCoreMVC
{    
    public class SideItem
    {
        public string Header { get; set; }
        public string Can { get; set; }
        public string Icon { get; set; }
        public string Name { get; set; }
        public string Link { get; set; }
        public string Target { get; set; }
        public string Class { get; set; }
        public string Onclick { get; set; }
        public string Align { get; set; }
        public string Active { get; set; }
        public BadgeStyle Badge { get; set; }

        public List<SideItem> SubMenu {
            get ; set;
        }
    }
    public class BadgeStyle{
        public string color { get; set; }
        public string text { get; set; }
    }
}