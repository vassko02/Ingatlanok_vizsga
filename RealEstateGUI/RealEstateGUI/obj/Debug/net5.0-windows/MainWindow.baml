   M S B A M L   `   `   `  ����H  DRealEstateGUI, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null-clr-namespace:RealEstateGUIRealEstateGUI  5   	       RealEstateGUI.MainWindow   5   	   W SPresentationCore, Version=5.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=5.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35e aSystem.Windows.Controls.Ribbon, Version=5.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089R NWindowsBase, Version=5.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35F 9http://schemas.microsoft.com/winfx/2006/xaml/presentation     5   	   R NSystem.Xaml, Version=5.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   -localclr-namespace:RealEstateGUI     5   	     � Title$  
MainWindow��5   	   $	��450��6   $	��800��6)   .��5	      �  � ColumnDefinitions 5
   
   �� 5      $	��200 �6   �� 5      $��* �6    � RowDefinitions 5   
   �� 5      $	��130 �6   �� 5      $��* �6   .+�5   
   �� -   5        $��lb_nevek��5      $��2��6"   $��5q�63    �� DisplayMemberPath$
 name��6>   $ �� IsSynchronizedWithCurrentItem$
 TrueY�5   '   ��5   W   �� 5      �� 5   
   $��1��6   .+�5      ��  �� Orientation$ 
Horizontal=�6   .+�5      �� $��Eladó neve: ��6   $	��150��6/   $��5q�6;   �� 5      -   5        $��	lbl_elado��5      $��5q�6)   5      �� 5      $ 
Horizontal=�6   .+�5      �� $��Eladó telefonszáma: ��6   $	��150��67   $��5q�6C   �� 5      -   5        $��lbl_telefon��5      $��5q�6+   5      �� 5       -   5         ��Name$ 
btb_betolt��5       $��Hirdetések betöltése��6-   $��5q�6L   6W   �� 5!      $ 
Horizontal=�6   .+�5"      �� $��HIrdetések száma: ��6   $	��150��65   $��5q�6A   �� 5#      -   5        $��lbl_hirdetesszam��5#      $��5q�60   5$      5%      5&      5'      