using System;
using System.Collections.Generic;
using System.Globalization;
using System.IO;
namespace RealEstate
{
    class Program
    {
        public static List<Ad> ads = new List<Ad>();
        static void Main(string[] args)
        {
            ads = Ad.Loadfromcsv("realestates.csv");
            Console.WriteLine("6. feladat: Földszinti ingatlanok átlagos alapterülete: {0:f} m2", hatodikFeladat());
            Ad kozelAd = nyolcadikFeladat();
            Console.WriteLine("8.feladat: Mesevár óvodához legközelebbi tehermentes ingatlan dadatai:");
            Console.WriteLine("Eladó neve: {0}", kozelAd.seller.name);
            Console.WriteLine("Eladó telefonja: {0}", kozelAd.seller.phone);
            Console.WriteLine("Alapterület: {0}", kozelAd.area);
            Console.WriteLine("Szobák száma: {0}", kozelAd.rooms);
            Console.ReadLine();
        }

        private static Ad nyolcadikFeladat()
        {
            string meseVar = "47.4164220114023,19.066342425796986";
            double legkozelebbitav = double.MaxValue;
            Ad legkozelebbiAd = new Ad();
            foreach (var item in ads)
            {
                if (item.freeOfCharge==true&&DistanceTo(item,meseVar)<legkozelebbitav)
                {
                    legkozelebbiAd = item;
                    legkozelebbitav= DistanceTo(item, meseVar);
                }
            }
            return legkozelebbiAd;
        }

        private static double DistanceTo(Ad ad, string koordinata)
        {
            string[] elsoadatok = (ad.latLong.Split(','));
            double adElso = double.Parse(elsoadatok[0], CultureInfo.InvariantCulture);
            double adMasodik = double.Parse(ad.latLong.Split(',')[1], CultureInfo.InvariantCulture);

            double koordinataElso = double.Parse(koordinata.Split(',')[0], CultureInfo.InvariantCulture);
            double koordinataMasodik = double.Parse(koordinata.Split(',')[1], CultureInfo.InvariantCulture);

            double distance = Math.Sqrt((koordinataElso-adElso)* (koordinataElso - adElso)+ (koordinataMasodik - adMasodik) * (koordinataMasodik - adMasodik));
            return distance;
        }
        private static double hatodikFeladat()
        {
            double osszeg = 0;
            double count = 0;
            foreach (var item in ads)
            {
                if (item.floors==0)
                {
                    osszeg += item.area;
                    count++;
                }
            }
            double atlag = osszeg / count;
            return atlag;
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
