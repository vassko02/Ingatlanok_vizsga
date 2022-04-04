using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;
using System.Collections.ObjectModel;
using MySql.Data.MySqlClient;
using System.Configuration;

namespace RealEstateGUI
{
    class Ad
    {
        private int _area;
        public int area
        {
            get { return _area; }
            set { _area = value; }
        }

        private DateTime _createdAt;

        public DateTime cretedAt
        {
            get { return _createdAt; }
            set { _createdAt = value; }
        }

        private string _desc;

        public string desc
        {
            get { return _desc; }
            set { _desc = value; }
        }

        private int _floors;

        public int floors
        {
            get { return _floors; }
            set { _floors = value; }
        }

        private int _freeOfCharge;

        public int freeOfCharge
        {
            get { return _freeOfCharge; }
            set { _freeOfCharge = value; }
        }

        private int _id;

        public int id
        {
            get { return _id; }
            set { _id = value; }
        }


        private string _imageURL;

        public string imageURL
        {
            get { return _imageURL; }
            set { _imageURL = value; }
        }

        private string _latLong;

        public string lotLong
        {
            get { return _latLong; }
            set { _latLong = value; }
        }

        private int _rooms;

        public int rooms
        {
            get { return _rooms; }
            set { _rooms = value; }
        }

        private int _sellerId;

        public int sellerId
        {
            get { return _sellerId; }
            set { _sellerId = value; }
        }
        private int _categoryID;

        public int categoryID
        {
            get { return _categoryID; }
            set { _categoryID = value; }
        }
        public double osszeg { get; set; }

        public Ad(MySqlDataReader reader)
        {
            this.id = Convert.ToInt32(reader["id"]);
            this.sellerId = Convert.ToInt32(reader["sellerId"]);
            this.categoryID = Convert.ToInt32(reader["categoryId"]);
            this.freeOfCharge = Convert.ToInt32(reader["freeofcharge"]);
            this.area = Convert.ToInt32(reader["area"]);
            this.rooms = Convert.ToInt32(reader["rooms"]);
            this.floors = Convert.ToInt32(reader["floors"]);
            this.cretedAt = Convert.ToDateTime(reader["createdAt"]);
            this.desc = reader["description"].ToString();
            this.lotLong = reader["latLong"].ToString();
            this.imageURL = reader["imageUrl"].ToString();
        }
        public Ad()
        {

        }
        public static ObservableCollection<Ad> select(int id)
        {
            var lista = new ObservableCollection<Ad>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "SELECT Count(*) as osszeg FROM realestates where sellerId = @id";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@id", id);
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new Ad()
                            {
                                osszeg = Convert.ToDouble(reader["osszeg"])
                            });
                        }
                    }
                }
            }
            return lista;
        }
    }
}
