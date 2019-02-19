<?php

use Illuminate\Database\Seeder;
use App\Hotel;
use App\User;

class HotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotel = new Hotel;
        $hotel->name = 'Dunsilly Hotel';
        $hotel->address = '20 Dunsilly Road, Antrim, BT41 2JH, United Kingdom';
        $hotel->phone = '01232456';
        $hotel->email = 'hotel@one.com';
        $hotel->user_id = '3';
        $hotel->county = 'Antrim';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Dobbin Lodge';
        $hotel->address = '8 Dobbin Street, Armagh, BT6 17QQ, United Kingdom';
        $hotel->phone = '01232456';
        $hotel->email = 'hotel@two.com';
        $hotel->user_id = '4';
        $hotel->county = 'Armagh';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Woodford Dolmen Hotel Carlow';
        $hotel->address = ' 32 Kilkenny Road, Carlow, Ireland';
        $hotel->phone = '01232456';
        $hotel->email = 'hotel@three.com';
        $hotel->user_id = '5';
        $hotel->county = 'Carlow';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Roadside Cottage The Burren';
        $hotel->address = 'Main St County Clare, V95 AV61 Kilfenora, Ireland';
        $hotel->phone = '01232456';
        $hotel->email = 'hotel@four.com';
        $hotel->user_id = '6';
        $hotel->county = 'Clare';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Maldron Hotel Shandon Cork City';
        $hotel->address = 'John Redmond Street, Shandon, Cork, Ireland';
        $hotel->phone = '01232456';
        $hotel->email = 'hotel@five.com';
        $hotel->user_id = '7';
        $hotel->county = 'Cork';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Waterfoot Hotel';
        $hotel->address = 'Caw Roundabout, Derry, BT47 6TB, United Kingdom';
        $hotel->phone = '01232456';
        $hotel->email = 'hotel@six.com';
        $hotel->user_id = '8';
        $hotel->county = 'Derry';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'The Gateway Lodge';
        $hotel->address = 'Killybegs Road (R925), Donegal Town, Donegal, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@seven.com';
        $hotel->user_id = '9';
        $hotel->county = 'Donegal';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Clandeboye Lodge Hotel';
        $hotel->address = '10 Estate Road, Clandeboye, Bangor, BT19 1UR, United Kingdom';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@eight.com';
        $hotel->user_id = '10';
        $hotel->county = 'Down';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Clayton Hotel Cardiff Lane';
        $hotel->address = 'Cardiff Lane, Sir John Rogersons Quay, Dublin 2, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@nine.com';
        $hotel->user_id = '11';
        $hotel->county = 'Dublin';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Lough Erne Resort';
        $hotel->address = 'Belleek Road, Enniskillen, BT93 7ED, United Kingdom';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@ten.com';
        $hotel->user_id = '12';
        $hotel->county = 'Fermanagh';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'The Connacht Hotel';
        $hotel->address = 'Dublin Road, Galway, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@eleven.com';
        $hotel->user_id = '13';
        $hotel->county = 'Galway';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Butler Arms Hotel';
        $hotel->address = 'New Line Road, Waterville, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@twelve.com';
        $hotel->user_id = '14';
        $hotel->county = 'Kerry';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Silken Thomas';
        $hotel->address = 'The Square, Kildare Town, R51 HK54 Kildare, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@thirteen.com';
        $hotel->user_id = '15';
        $hotel->county = 'Kildare';
        $hotel->save();


        $hotel = new Hotel;
        $hotel->name = 'Kilkenny Ormonde Hotel';
        $hotel->address = 'Ormonde Street,Kilkenny, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@fourteen.com';
        $hotel->user_id = '16';
        $hotel->county = 'Kilkenny';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'The Heritage Killenard';
        $hotel->address = 'Windmill Terrace, Killenard, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@fifteen.com';
        $hotel->user_id = '17';
        $hotel->county = 'Laois';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Lough Allen Hotel & Spa';
        $hotel->address = 'Main Street, Drumshanbo, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@sixteen.com';
        $hotel->user_id = '18';
        $hotel->county = 'Leitrim';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'George Limerick Hotel';
        $hotel->address = "O'Connell Street, Limerick, Ireland";

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@seventeen.com';
        $hotel->user_id = '19';
        $hotel->county = 'Limerick';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Longford Arms Hotel';
        $hotel->address = 'Main Street, Longford, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@eighteen.com';
        $hotel->user_id = '20';
        $hotel->county = 'Longford';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Carnbeg Hotel';
        $hotel->address = 'Carnbeg, Armagh Road, Dundalk, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@nineteen.com';
        $hotel->user_id = '21';
        $hotel->county = 'Louth';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'McWilliam Park Hotel';
        $hotel->address = 'Kilcolman Road, Claremorris, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@twenty.com';
        $hotel->user_id = '22';
        $hotel->county = 'Mayo';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'The Johnstown Estate';
        $hotel->address = 'Johnstown, Enfield, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@twentyone.com';
        $hotel->user_id = '23';
        $hotel->county = 'Meath';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Hillgrove Hotel, Leisure & Spa';
        $hotel->address = 'Old Armagh Rd, Monaghan, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@twentytwo.com';
        $hotel->user_id = '24';
        $hotel->county = 'Monaghan';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Bridge House Hotel, Leisure Club & Spa';
        $hotel->address = 'Bridge Street, Tullamore, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@twentythree.com';
        $hotel->user_id = '25';
        $hotel->county = 'Offaly';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = "Hannon's Hotel";
        $hotel->address = 'Athlone Road, Roscommon, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@twentyfour.com';
        $hotel->user_id = '26';
        $hotel->county = 'Roscommon';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Riverside Hotel ';
        $hotel->address = 'Riverside, F91 X92V Sligo, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@twentyfive.com';
        $hotel->user_id = '27';
        $hotel->county = 'Sligo';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'GN Ballykisteen Golf Hotel';
        $hotel->address = 'Ballykisteen, Tipperary, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@twentysix.com';
        $hotel->user_id = '28';
        $hotel->county = 'Tipperary';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'The Valley Hotel';
        $hotel->address = '60 Mian Street, Fivemiletown, BT75 0PW, United Kingdom';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@twentyseven.com';
        $hotel->user_id = '29';
        $hotel->county = 'Tyrone';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Waterford Marina Hotel';
        $hotel->address = 'Canada Street, Waterford, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@twentyeight.com';
        $hotel->user_id = '30';
        $hotel->county = 'Waterford';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Mullingar Park Hotel';
        $hotel->address = 'Dublin Road, Mullingar, Westmeath, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@twentynine.com';
        $hotel->user_id = '31';
        $hotel->county = 'Westmeath';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Clayton Whites Hotel';
        $hotel->address = 'Abbey Street, Wexford, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@thirty.com';
        $hotel->user_id = '32';
        $hotel->county = 'Wexford';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Dunbur Lodge';
        $hotel->address = 'Dunbur Road, Wicklow, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@thirtyone.com';
        $hotel->user_id = '33';
        $hotel->county = 'Wicklow';
        $hotel->save();

        $hotel = new Hotel;
        $hotel->name = 'Farnham Estate Spa and Golf Resort';
        $hotel->address = 'Farnham Estate, Cavan, Ireland';

        $hotel->phone = '01232456';
        $hotel->email = 'hotel@thirtytwo.com';
        $hotel->user_id = '34';
        $hotel->county = 'Cavan';
        $hotel->save();



    }
}
