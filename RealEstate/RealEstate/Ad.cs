using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;

namespace RealEstate
{
    class Ad
    {
        public int area { get; set; }

        public Category category { get; set; }
        public DateTime createdAt { get; set; }
        public string description { get; set; }
        public int floors { get; set; }
        public bool freeOfCharge { get; set; }
        public int id { get; set; }
        public string imageURL { get; set; }
        public string latLong { get; set; }
        public int rooms { get; set; }
        public Seller seller { get; set; }
        //rooms;latlong;floors;area;description;freeofcharge;imageUrl;sellername;sellerphone;categoryname;createat

        public Ad(string[] adatok)
        {
            this.rooms = int.Parse(adatok[0]);
            this.latLong = adatok[1];
            this.floors = int.Parse(adatok[2]);
            this.area = int.Parse(adatok[3]);
            this.description = adatok[4];
            this.imageURL = adatok[6];
            this.seller = new Seller();
            this.seller.name = adatok[7];
            this.seller.phone = adatok[8];
            this.category = new Category();
            this.category.name = adatok[9];
            this.createdAt = Convert.ToDateTime(adatok[10]);
            if ( int.Parse(adatok[5])==1)
            {
                this.freeOfCharge = true;
            }
            else
            {
                this.freeOfCharge = false;
            }
        }
        public Ad()
        {

        }
        public static List<Ad> Loadfromcsv(string fajlnev)
        {
            List<Ad> Ads = new List<Ad>();
            StreamReader sr = new StreamReader(fajlnev);
            string[] adatok;
            sr.ReadLine();
            do
            {
                adatok = sr.ReadLine().Split(';');
                Ad ujAd = new Ad(adatok);
                Ads.Add(ujAd);
            } while (!sr.EndOfStream);
            sr.Close();
            return Ads;
        }

    }
}
