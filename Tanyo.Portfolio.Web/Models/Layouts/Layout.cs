using System.Collections.Generic;

namespace Takerman.Portfolio.Web.Models
{
    public class Layout
    {
        public Layout()
        {
            this.Header = new Header();
            this.Footer = new Footer();
            this.Brands = new List<Brand>();
            this.Head = new Head();
            this.Banner = new Banner();
        }

        public Header Header { get; set; }
        public Footer Footer { get; set; }
        public IEnumerable<Brand> Brands { get; set; }
        public Head Head { get; set; }
        public Banner Banner { get; set; }
    }
}