using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace RealEstateGUI
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        ObservableCollection<Seller> hirdetok = Seller.select();
        Seller valasztott = new Seller();
        public MainWindow()
        {
            InitializeComponent();
            lb_nevek.DataContext = hirdetok;
        }

        private void lb_nevek_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            valasztott = (Seller)lb_nevek.SelectedItem;
            lbl_elado.Content = valasztott.name;
            lbl_telefon.Content = valasztott.phone;
        }
        private void btb_betolt_Click(object sender, RoutedEventArgs e)
        {
            lbl_hirdetesszam.Content = Ad.select(valasztott.id)[0].osszeg;
        }
    }
}
