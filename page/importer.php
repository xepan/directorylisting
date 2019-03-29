<?php

namespace xepan\listing;

class page_importer extends \xepan\base\Page {
	public $title='Importer';

	function init(){
		parent::init();

		error_reporting(E_ALL);
		ini_set('display_errors', 1);

	$property_data = [
	[16,7,"Plot for sell","sell","plot",2600,1250.00,"sqft",NULL,NULL,"Shobhagpura","UDAIPUR","Rajasthan",313001,"Plot for sell near ceremony resort shobhagpura Udaipur 1250 sf plot 25*50 Agriculture","{\"converted\": \"agriculture\"}","2018-09-09 14:25:50","2018-09-09 14:25:50",NULL],
	[18,7,"Commercial plot for sell","sell","commercial",20000,1765.00,"sqft",NULL,NULL,"Shobhagpura","UDAIPUR","Rajasthan",313001,"Commercial plot for sell on 100 fit near Shobhagpura circle",NULL,"2018-09-09 14:34:27","2018-09-09 14:34:27",NULL],
	[19,7,"Plot for sell","sell","plot",2800,1250.00,"sqft",NULL,NULL,"Near Mewar hospital senh Villa project","UDAIPUR","Rajasthan",313001,"Plot for sell uit convert 1250 sf near Mewar hospital senh Villa project new navratan 9214456424","{\"converted\": \"converted\"}","2018-09-09 17:55:14","2018-09-09 17:55:14",NULL],
	[20,8,"house for rent","rent","house",15000,1500.00,"sqft",3,"[\"/storage/properties/ld3LJctczjBZPyxC2L4PZKSSnU4Gju5TabEm3U2K.jpeg\"]","Mahadev Complex, Opposite To Ashoka Palace, 100 Feet Road, Udaipur, Shobhagpura, Udaipur","udaipur","Rajasthan",313001,NULL,"{\"bedrooms\": null, \"bathrooms\": null, \"building_age\": null}","2018-09-10 10:10:04","2018-09-10 10:10:04",NULL],
	[21,8,"house no. 1","rent","commercial",15000,1500.00,"sqft",NULL,"[\"/storage/properties/mvccOnpP1FDMikM9WbrWO7XVnjiHkiyoqYMZDkQO.jpeg\"]","hiren mangri sec.5","udaipur","Rajasthan",313001,NULL,NULL,"2018-09-12 15:34:32","2018-09-12 15:34:32",NULL],
	[22,10,"Plot available for rent","rent","plot",20000,1250.00,"sqft",NULL,NULL,"Near ceremony resort shobhagpura udaipur","Udaipur","Rajasthan",313001,"Plot available for rent near ceremony resort 1250 sf","{\"converted\": \"agriculture\"}","2018-09-16 19:01:33","2018-09-16 19:01:33",NULL],
	[23,10,"Flat available for rent","rent","apartment",15000,1700.00,"sqft",3,NULL,"Meera Nagar shobhagpura","Udaipur","Rajasthan",313001,"3bhk  semi furnished flat Avaiable for rent","{\"bedrooms\": \"3\", \"bathrooms\": \"3\", \"building_age\": \"5\"}","2018-09-16 19:05:14","2018-09-16 19:05:14",NULL],
	[24,10,"Plot for sell","sell","plot",300,4000.00,"sqft",NULL,NULL,"Udai club gudli","Udaipur","Rajasthan",313001,"Converted plot for sell near ricco industry area gudli","{\"converted\": \"converted\"}","2018-09-16 19:08:16","2018-09-16 19:08:16",NULL],
	[25,14,"General clear land","sell","land",5000000,2.00,"bigha",NULL,NULL,"Distance from chetak to 10 kilomitar jadhol rod near by araliyas resort","Udaipur","Rajasthan",313001,"Hello general land clear title distance from city only 10 kilomitar nice location","{\"converted\": \"converted\"}","2018-09-17 03:46:36","2018-09-17 03:46:36",NULL],
	[26,7,"Office available on rent","rent","commercial",26000,809.00,"sqft",NULL,"[\"/storage/properties/x76FUlsUcl7d82cNLuZtIKXOWARoG3YHJ17kNLP4.jpeg\", \"/storage/properties/IY7WQJXp4I1rxNnawkRyEAvrZQowIoMfDF2eW9pB.jpeg\", \"/storage/properties/k7iw0O3GbDjmGZatoqw7d75zuVGy645VL2duaaGg.jpeg\", \"/storage/properties/ZmnfMxqdg9tTZJSeJSJ8t6yBREStgLEKsO2JT8CC.jpeg\", \"/storage/properties/r6hYU7paqqTRAyz6pkWA1moOjacwZlU5Z5vf7BC4.jpeg\", \"/storage/properties/cIkf1htXmgXmFHGO7hk83A4uKxOokWXmilTNcnHq.jpeg\", \"/storage/properties/ngngQ3M2NQ4KYPH1ZJ7w0PwWxVRPt02RH9OG7bR0.jpeg\", \"/storage/properties/6deTYPIzt8Q3pFLWh1xVeVyVutXliY3M4Errfrok.jpeg\", \"/storage/properties/eZEV2zVXMQve5oGeT3pFnTwo0fUCvo0ExrSNmexO.jpeg\", \"/storage/properties/4cIabYeuD3s1EkllebD8bPLn9HBvr4InPjijdfhw.jpeg\"]","Sector 11","Udaipur","Rajasthan",313001,"809 sf fully furnished office Avaiable on rent at sec 11",NULL,"2018-09-17 19:08:30","2018-09-17 19:08:30",NULL],
	[27,7,"House for sell","sell","house",3200000,850.00,"sqft",3,"[\"/storage/properties/EBRvjwzcueGjJv8bSpU3unNUdYnvXfBu2zw1K5gh.jpeg\", \"/storage/properties/4NrAWTWxIy7dUqUSh1sGrJSgpAhW5NFOMVHlC2DP.jpeg\", \"/storage/properties/4KLCIIzIDfMHSfWfO21F43mEa5Cd8oItoj6BVVzR.jpeg\", \"/storage/properties/ZWh3rU0i5jzI53GhlATmubFVaiULTLbCrcw1Sxzv.jpeg\", \"/storage/properties/nwH9Iw4iPAVMLRXsQQew2lEEkQLzcb9IXj2tpkVQ.jpeg\", \"/storage/properties/moDWOXJiaAGWg4STxHFUfgBywF92o6gXj8xfabPf.jpeg\", \"/storage/properties/XuziKRmDaDr6ke04TKWow9pHbPnZsCnCN6ehNhH8.jpeg\", \"/storage/properties/SUJLI5ljXGCszwH8J5uRsp9qvZrZBtTZd1GTBPZu.jpeg\"]","Sec 14","Udaipur","Rajasthan",313001,"13*27 sf house for sell sec 14","{\"bedrooms\": \"3\", \"bathrooms\": \"2\", \"building_age\": \"1\"}","2018-09-17 19:16:21","2018-09-18 15:38:07",NULL],
	[28,7,"3bhk house on rent","rent","apartment",15000,1685.00,"sqft",3,NULL,"Meera Nagar shobhagpura","Udaipur","Rajasthan",313001,"3bhk semi furnished flat available on rent near merra nagar","{\"bedrooms\": \"3\", \"bathrooms\": \"3\", \"building_age\": \"5\"}","2018-09-17 19:18:58","2018-09-17 19:18:58",NULL],
	[29,7,"Commercial space 900 sf","rent","commercial",50000,900.00,"sqft",NULL,NULL,"Sardarpura","Udaipur","Rajasthan",313001,"900 sf hall available on rent bear city area",NULL,"2018-09-17 19:21:05","2018-09-17 19:21:05",NULL],
	[30,7,"2200 sf hall on rent","rent","commercial",40000,2200.00,"sqft",NULL,NULL,"Near university road","Udaipur","Rajasthan",313001,"2200 sf hall available on rent near 100 fit road",NULL,"2018-09-17 19:23:03","2018-09-17 19:23:03",NULL],
	[31,7,"3bhk on rent for commercial or residence","rent","apartment",25000,2000.00,"sqft",3,NULL,"Sukhadiya circle","Udaipur","Rajasthan",313001,"3bhk flat on rent for commercial porpose","{\"bedrooms\": \"3\", \"bathrooms\": \"3\", \"building_age\": \"1\"}","2018-09-17 19:25:45","2018-09-17 19:25:45",NULL],
	[32,7,"Small Plot for sell","sell","plot",355,3200.00,"sqft",NULL,NULL,"MIA","Udaipur","Rajasthan",313001,"Small plots available for sell MIA housing board colony","{\"converted\": \"converted\"}","2018-09-17 19:27:34","2018-09-17 19:27:34",NULL],
	[33,7,"2bhk separate house on rent","rent","house",12000,1200.00,"sqft",2,NULL,"Subhah nagar","Udaipur","Rajasthan",313001,"2bhk semi furnished separate house Avaiable on rent","{\"bedrooms\": \"2\", \"bathrooms\": \"2\", \"building_age\": \"5\"}","2018-09-17 19:31:56","2018-09-17 19:31:56",NULL],
	[34,7,"Hall on rent ground floor","rent","commercial",22000,713.00,"sqft",NULL,NULL,"Sector 11","Udaipur","Rajasthan",313001,"713 sf showroom Available on rent at sec 11.",NULL,"2018-09-17 19:34:51","2018-09-17 19:34:51",NULL],
	[35,7,"Office for sell","sell","commercial",7500,809.00,"sqft",NULL,"[\"/storage/properties/4w7NScEhT21udnQ7L8u3h1KKQv3Acqem5xN5USTW.jpeg\", \"/storage/properties/dGPXq1PFsgLOdGrU5qbCk6ZKby2OEfdkpQHsmsvG.jpeg\", \"/storage/properties/e98zHHAt97RiSaybjr0rDIUMEoOpLPP96egBwf0v.jpeg\", \"/storage/properties/jHwUfgzb7jZ3KSrCDG5cYo29nwgmkn9YVboMTsjA.jpeg\", \"/storage/properties/R3gUuNEngHkSGAh6Vxr5c4Xa62ayjKppCXHCTRWt.jpeg\", \"/storage/properties/sUzWBvSPgFonKS4xt9h2C4XTbcqAkiRw6BrCwNXt.jpeg\", \"/storage/properties/rwRllMpfCga5udG8OEiCLj4fBn3ZBxhC8IjNBdCO.jpeg\", \"/storage/properties/JuhNsnywvswAPuAGaCith9VARdxbZg1v2nWhI16N.jpeg\", \"/storage/properties/5FOFxI7OAkLhT8QTzvmGFu4PwlqaDtywPvBNtduo.jpeg\", \"/storage/properties/FnukHaIHXtI4Bcim9dwf0wSpwQ1sAk6Z2qPCOYdd.jpeg\"]","Sector 11","Udaipur","Rajasthan",313001,"Furnished office 809 sf for sell near sector 11",NULL,"2018-09-17 19:37:17","2018-09-18 17:47:13",NULL],
	[36,7,"Plot for sell","sell","commercial",20000,1765.00,"sqft",NULL,NULL,"Shobhagpura","Udaipur","Rajasthan",313001,"Commercial plot for sell near shobhagpura",NULL,"2018-09-17 19:43:51","2018-09-17 19:43:51",NULL],
	[37,7,"Office available on rent","rent","commercial",20000,750.00,"sqft",NULL,NULL,"Shakti nagar","UDAIPUR","Rajasthan",313001,"750 sf office available on rent Shakti nagar",NULL,"2018-09-18 12:56:43","2018-09-18 12:56:43",NULL],
	[38,7,"3 bhk flat for sell","sell","apartment",4400000,1685.00,"sqft",3,NULL,"Shobhagpura","UDAIPUR","Rajasthan",313001,"3bhk flat1685 sf available for sell near celebration mall including parking area no other charges","{\"bedrooms\": \"3\", \"bathrooms\": \"3\", \"building_age\": \"1\"}","2018-09-18 17:44:43","2018-09-18 19:00:54",NULL],
	[39,7,"2bhk","sell","apartment",3200000,1180.00,"sqft",2,NULL,"2hk flat for sell near celebration mall including car parking contact","UDAIPUR","Rajasthan",313001,"2bhk flat for sell near celebration mall including parking area","{\"bedrooms\": \"2\", \"bathrooms\": \"1\", \"building_age\": \"1\"}","2018-09-18 17:52:07","2018-09-18 19:02:09",NULL],
	[40,7,"Land on rent","rent","land",150000,15000.00,"sqft",NULL,NULL,"Near RK circle","UDAIPUR","Rajasthan",313001,"15000 sf land available on rent  prime location near RK circle shobhagpura Udaipur","{\"converted\": \"agriculture\"}","2018-09-18 18:48:39","2018-09-18 18:49:38",NULL],
	[41,16,"House","rent","house",13000,1700.00,"sqft",2,"[\"/storage/properties/MIfABERlK7XzItwNZm0Zes5BzihOtiyBxiNgWars.jpeg\", \"/storage/properties/RGxiTi32V7oCtnkT9JUmgQ0w104IIFg8sZ2eqGs3.jpeg\"]","18 Adarsh colouny pulla near r k circle","Udaipur","RJASTHAN",27,NULL,"{\"bedrooms\": \"2\", \"bathrooms\": \"2\", \"building_age\": \"5\"}","2018-09-19 01:21:20","2018-09-19 01:21:20",NULL],
	[42,16,"House","rent","house",13000,1700.00,"sqft",2,NULL,"18 Adarsh colouny pulla near r k circle","Udaipur","RJASTHAN",27,NULL,"{\"bedrooms\": \"2\", \"bathrooms\": \"2\", \"building_age\": \"5\"}","2018-09-19 01:22:47","2018-09-19 01:22:47",NULL],
	[43,16,"House","rent","house",13000,1700.00,"sqft",2,"[\"/storage/properties/iC2Nopxu6vcPNed7F4x3APuNeZeKTXQruamQOjcO.jpeg\"]","18 Adarsh colouny pulla near r k circle pulla udaipur","Udaipur","Rajasthan",27,NULL,"{\"bedrooms\": \"2\", \"bathrooms\": \"2\", \"building_age\": \"5\"}","2018-09-19 01:25:53","2018-09-19 01:25:53",NULL],
	[44,16,"House","rent","house",13000,1700.00,"sqft",2,NULL,"18 Adarsh colouny pulla near r k circle pulla udaipur","Udaipur","Rajasthan",27,NULL,"{\"bedrooms\": \"2\", \"bathrooms\": \"2\", \"building_age\": \"5\"}","2018-09-19 01:27:51","2018-09-19 01:27:51",NULL],
	[45,17,"3bhk flat available on rent","rent","apartment",15000,1685.00,"sqft",3,NULL,"Meera nagar","Udaipur","Rajasthan",313001,"3bhk semi furnished flat on rent meera Nagar prime location","{\"bedrooms\": \"3\", \"bathrooms\": \"3\", \"building_age\": \"5\"}","2018-09-19 16:50:02","2018-09-19 16:50:02",NULL],
	[46,17,"Plot on rent","rent","plot",22000,1185.00,"sqft",NULL,NULL,"Shobhagpura","Udaipur","Rajasthan",313001,"Plot on rent 1185 SF near ceremony resort 30 fit 30 fit corner plot","{\"converted\": \"agriculture\"}","2018-09-19 16:56:59","2018-09-19 16:56:59",NULL],
	[47,18,"Commercial convert shop","sell","commercial",20000,200.00,"sqft",NULL,NULL,"Main Retistand chowk opp.Krishi upaj mandi","Udaipur","Rajasthan",313001,NULL,NULL,"2018-09-20 17:59:44","2018-09-20 17:59:44",NULL],
	[48,20,"House for sale","sell","house",6500000,1200.00,"sqft",7,"[\"/storage/properties/QybmtMOEek1UIFqXps5Hf1AEQx7Q4Zkx81R94dVJ.jpeg\", \"/storage/properties/pQ9QZOSrxDDnb0wxVGXwC13Vo6qG9YoPh3eiq4ef.jpeg\", \"/storage/properties/fvMl18TM2awFASwDQ8F5RvMfU1Buf3HoJ6JjdCwP.jpeg\", \"/storage/properties/spqfZlUW8MS5ZoOnNsYTXYEJr25WDbh4UQNE77gh.jpeg\", \"/storage/properties/YqhEIAYaa92RB6sCTvDtpmnzKwDybv7hOliu8WOU.jpeg\", \"/storage/properties/B6tpjuvSyBFEWt5wAUcD7bQiA2kuRA9THGuSu1Ax.jpeg\", \"/storage/properties/cFbVgrLeZWeYW0WkNQmEzTUFMLIv2csGyvwO8j65.jpeg\", \"/storage/properties/Z6gg1jjIRSW8l2rIsuAcQAL4Yl9AveExKQhpVmH6.jpeg\", \"/storage/properties/n9MOl17rVkkkfwXBuYW3lhMJASj2jQOeRUqg81Lh.jpeg\", \"/storage/properties/l78jhkcq4zTBlSag3qy6XfmTceiV551u3ua9tl9w.jpeg\"]","Amal ka kanta","Udaipur","Rajasthan",313001,"A old house at the heart of the city is ready for sale. Price negotiable.","{\"bedrooms\": \"7\", \"bathrooms\": \"3\", \"building_age\": \"20\"}","2018-09-21 12:52:05","2018-09-26 07:56:11",NULL],
	[49,20,"Plot for sell","sell","plot",2500,1250.00,"sqft",NULL,NULL,"Near Ceremony resort, Shobhagpura","Udaipur","Rajasthan",313001,"Title Cleared agriculture plot is read for sale. Price is negotiable.","{\"converted\": \"agriculture\"}","2018-09-24 08:05:50","2018-09-24 08:05:50",NULL],
	[50,22,"Jaipur 160gaj near SEZ Ajmer road","sell","plot",4000,1425.00,"sqft",NULL,NULL,"Ajmer road Angan prime. Mangalam","Jaipur","Rajasthan",302015,NULL,"{\"converted\": \"converted\"}","2018-09-26 18:01:02","2018-09-26 18:01:02",NULL],
	[51,29,"Land Available on main road in front of mahila police thana","rent","land",250000,1.00,"sqft",NULL,NULL,"Main road in front of mahila police thana","Udaipur","Rajasthan",313001,"28000 sq feet available on rent Rent negotiable","{\"converted\": \"agriculture\"}","2018-10-15 16:16:09","2018-10-15 16:16:42",NULL],
	[52,32,"Madhuban","sell","commercial",10000,3200.00,"sqft",NULL,NULL,"23 c madhuban","Udaipur","Rajasthan",313001,"Basement+ ground + 3 floor. Situated in the heart of udaipur. Mainly use for commercial purpose. 3300 sq ft each floor. Different price for different floor.Price negotiable.",NULL,"2018-10-16 08:29:31","2018-10-16 08:31:55",NULL],
	[53,34,"Padmawati krupa","sell","house",6000000,1250.00,"sqft",2,"[\"/storage/properties/FlIVvSaktitP0jsLX4P2sMly1D4gLcWgKIfBzYwl.jpeg\", \"/storage/properties/S3nvuKa0SyZucKE3s6Y9ZRBFknX4TdLsZI9AczBs.jpeg\", \"/storage/properties/jz8ym2sPUad5w4gHKkXrezs96IdbhygVj8kQe6Ic.jpeg\"]","6 kh 14 Ram Singh ji ki badi hiran magri sec 11","Udaipur","Rajasthan",313002,"East facing 1250 square feet plot Covered area 750 square feet 500 square feet open area Housing board house","{\"bedrooms\": null, \"bathrooms\": \"1\", \"building_age\": \"20\"}","2018-10-16 11:49:46","2018-10-16 11:49:46",NULL],
	[54,34,"Padmawati krupa","sell","house",6000000,1250.00,"sqft",2,"[\"/storage/properties/FlIVvSaktitP0jsLX4P2sMly1D4gLcWgKIfBzYwl.jpeg\", \"/storage/properties/S3nvuKa0SyZucKE3s6Y9ZRBFknX4TdLsZI9AczBs.jpeg\", \"/storage/properties/jz8ym2sPUad5w4gHKkXrezs96IdbhygVj8kQe6Ic.jpeg\"]","6 kh 14 Ram Singh ji ki badi hiran magri sec 11","Udaipur","Rajasthan",313002,"East facing 1250 square feet plot Covered area 750 square feet 500 square feet open area Housing board house","{\"bedrooms\": null, \"bathrooms\": \"1\", \"building_age\": \"20\"}","2018-10-16 11:49:48","2018-10-16 11:49:48",NULL],
	[55,34,"Padmawati krupa","sell","house",6000000,1250.00,"sqft",2,"[\"/storage/properties/FlIVvSaktitP0jsLX4P2sMly1D4gLcWgKIfBzYwl.jpeg\", \"/storage/properties/S3nvuKa0SyZucKE3s6Y9ZRBFknX4TdLsZI9AczBs.jpeg\", \"/storage/properties/jz8ym2sPUad5w4gHKkXrezs96IdbhygVj8kQe6Ic.jpeg\"]","6 kh 14 Ram Singh ji ki badi hiran magri sec 11","Udaipur","Rajasthan",313002,"East facing 1250 square feet plot Covered area 750 square feet 500 square feet open area Housing board house","{\"bedrooms\": null, \"bathrooms\": \"1\", \"building_age\": \"20\"}","2018-10-16 11:49:49","2018-10-16 11:49:49",NULL],
	[56,36,"freehold house","sell","house",2200000,185.00,"sqft",3,"[\"/storage/properties/jDg24WMUFGDaqq1ZHf4ctn4vDgFZcqCF54325pmG.png\", \"/storage/properties/blfGVwNl6wx1l3FhyUWl36e2qd3Hsm9DqORof6aK.png\", \"/storage/properties/NOc9P2V2YDPSjuUSvBFisB8XD8tFw0pg3i10vzc3.png\", \"/storage/properties/jeLFDIg8mJTvmHUGsAqk7NdTnxrQ8kLnrF6IESaQ.png\"]","sitaphal ki gali Ganeshghati","udaipur","rajasthan",313001,"Urgent for sale of house 2 rooms 1 room cum shop two latbath attach double story north facing corner property carpet area approx 185sqft location sitaphal ki gali Ganeshghati","{\"bedrooms\": \"3\", \"bathrooms\": \"2\", \"building_age\": \"50\"}","2018-10-17 13:00:50","2018-10-17 13:00:50",NULL],
	[57,38,"9 rooms bunglow at prime location","sell","house",15000000,24000.00,"sqft",11,NULL,"Tagore nagar hiran magri sector 4","Udaipur","Rajasthan",313001,NULL,"{\"bedrooms\": null, \"bathrooms\": null, \"building_age\": null}","2018-10-19 10:50:13","2018-10-19 10:50:13",NULL],
	[58,42,"Home for sale","sell","house",4500000,1100.00,"sqft",2,"[\"/storage/properties/lwuO6sZL06LbeoHqQxIGQcmwGaRDH32KnMMrcvII.png\"]","Nakoda Nagar Pratap Nagar","Udaipur","Rajasthan",313024,"Advance booking home for sale nakoda Nagar 1 / shobhag Nagar Pratap Nagar, plot no 13 / 17 / 18 /23 / 24 / 34 / 35  814 sqft 40lakhs east face 990sqft  42lakhs east face 1020sqft 42.50lakhs east face 1100 sqft re West face 1100 sqft 45lakhs west face 1320 sqft  55lakhs west face 1815 sqft  65lakhs west face Uit converted loanable semi-finished good location Cnt 9694149414 9829651819 2bedroom dinning hall 2letbath Store pujja room , modular kitchen, drawing room with pop , light fan ,Wardrobe with godhrage furniture parking , tubewell boring This rates valid 30/10/18","{\"bedrooms\": \"2\", \"bathrooms\": \"2\", \"building_age\": \"50\"}","2018-10-22 14:39:51","2018-10-22 14:39:51",NULL],
	[59,45,"west fase lonebal","sell","house",5100000,865.00,"sqft",3,NULL,"Sector 9","Udaipur","Rajasthan",313001,NULL,"{\"bedrooms\": \"3\", \"bathrooms\": \"3\", \"building_age\": \"1\"}","2018-10-23 15:42:09","2018-10-23 15:42:09",NULL],
	[60,48,"Green valley residency and resort","sell","plot",321,1000.00,"sqft",NULL,"[\"/storage/properties/AuNcJgfYh6OSxq2TMxHkSTHWSxGeHTTiDBrKQHxs.jpeg\", \"/storage/properties/Wm9rZyoe26upf6VSeyruWHSpotmxlo5maQEeZ0Nh.jpeg\", \"/storage/properties/4xTKmPjLZ310oiZ4x4MDwvWjRTMyyIWUJfDuFdwR.jpeg\", \"/storage/properties/YzrTcNwepW5y3zONwZQ1zZClOJ62nkhELalkAyHh.jpeg\", \"/storage/properties/hDtuhA1onvfFNFwXUnga0wn9sLHnIxNgZO48Zfng.jpeg\", \"/storage/properties/3cOh88EOyV9GaWnKq2oWMJtouSxZAIts5gt2GWho.jpeg\", \"/storage/properties/BW3H1o2Dzp5R2WFUXQF7BapkzTWSmUt9g7ESyrs0.jpeg\", \"/storage/properties/84i9qU8fdEc3M5zNzhO5TRaXvMB5F3gioB2bEzDj.jpeg\", \"/storage/properties/toP6STrfdCEgUXxaPfAxOKUtJPEXq9fHoCSDr2bt.jpeg\", \"/storage/properties/ZowSVPsPNcVzOGmBcQJw1Tp3cSH1l3Xfdz0q53Fu.jpeg\"]","Odan circle, behind miraj office, nathdwara road","Udaipur","Rajasthan",313001,"For booking,visit,details call:-9521362723,9782709723 All size Converted  plot, mahadev temple, resort,restorent,swimming pool,adventure park,plantation with designer light poll,over head water tank, damer road complete. Call:-9521362723,9782709723","{\"converted\": \"converted\"}","2018-10-26 07:44:34","2018-10-26 07:44:34",NULL],
	[61,49,"Converted plot in Udaipur","sell","plot",551,1000.00,"sqft",NULL,"[\"/storage/properties/zx6mgxMbnUWinUCBTyTs0qC8AizvnhrEPesexwCi.jpeg\", \"/storage/properties/KOEYmI6Bcvf4wH4hwaEtnOW1WSUbCsdvvn9hdXJI.jpeg\", \"/storage/properties/bn3pwjgwVjMZ23gyR6wHyvxOkAi0zbq1N3ffkLxM.jpeg\", \"/storage/properties/PBneTiThQQ5ACxfcZMrFYX2iVYUixkAIJzS7tSJK.jpeg\", \"/storage/properties/IR2WX3VaOMxet9zo0OOHmnXuqhz7J3J4EYOpUbWE.jpeg\", \"/storage/properties/b06vrOG3s6dqtBpr1ONJLwpVq6FKhaJXcSjaXsag.jpeg\", \"/storage/properties/MZoezlpzrDyqHhyJ2VNC3Iv1LBd8aYg7MX3LylD1.jpeg\", \"/storage/properties/E2e6610Ir1RT3Qe4JehOl5gvkDlkMVVR8mvp8CO1.jpeg\", \"/storage/properties/neBroNlccEUyw8gL77CMsVPGk1nS2oFXqhQzoKeJ.jpeg\", \"/storage/properties/jw92CGe10ntT4FfFRIstHPCxgI5z967PxH3AQ0UE.jpeg\"]","Near New railway station","Udaipur","Rajasthan",313001,"call:-8875147129,9782709723 location:-Near new railway station, in front of u.i.t. project, conecting to 100ft road, near by landmark:- pacific hospital and collage,sunrise collage,aravali collage,R.R.Dental collage.","{\"converted\": \"converted\"}","2018-10-26 08:29:11","2018-10-26 08:29:11",NULL],
	[62,53,"Planning green valley residency","sell","plot",291,1.00,"sqft",NULL,"[\"/storage/properties/6hRrNb0LnrwDULdnMyzb9IALmpjPwv38ljpcECiE.jpeg\", \"/storage/properties/Fl98oujF89KftdC1IwADNR77tjJNFtAhPTq8e3xT.jpeg\", \"/storage/properties/mf25KfpUt22s9XuWDSI1xrd0UfHQVX4RFe70mugV.jpeg\", \"/storage/properties/V23wGIZHINHAV7PsIxnFrIbtonQYylslJsiHHR00.jpeg\", \"/storage/properties/aoPB8KQxgvNDJ5JKnLh8q7tc7VPJJU48TWZDTqNG.jpeg\"]","Near rk house odan road","Nathdwara","Raj",313201,"Swimming pool temple gardan zip lain etc","{\"converted\": null}","2018-10-27 12:28:11","2018-10-27 12:28:11",NULL],
	[63,55,"Landmark Treasure Town Apartment","sell","apartment",2951000,1350.00,"sqft",2,"[\"/storage/properties/VfYEZFNwa4dfPMk6F2uRGdf1BiIK6G6BafuUHFFO.jpeg\"]","? पता: फतेहसागर से मात्र 2 मिनट की दूरी , प्रताप गौरव केन्द्र के पास , टाईगर हिल के सामने ,लैंडमार्क ट्रेजर टाऊन , मनोहरपुरा, बडगांव, उदयपुर -313011  कृपया एक बार फ्लैट देखने पधारें अथवा काॅल करे ☎️ 9309478032","UDAIPUR","RAJASTHAN",311011,"#FOR_SELL ? 2 BHK /1350 वर्ग फीट शानदार फ्लैट #दिवाली_स्पेशल_ऑफर @ ₹ 29.51 लाख मात्र @बडगांव उदयपुर  including all additional charges as bellow : 1 )  Parking -  75,000/- 2 )  Ex.Devolopment CHARGES  - 45,000/- 3 )  Ex.transformations/ Electricity - 50,000/- 4 )  Service Tax / GST 41000/- Total Benifit = 2.11 lakh ? RENT BACHAO APNA GHAR BNAO!! ? Ready to Move? Loan facility 90%available.Interest rates starting @ 8.10% ? Doorstep Services ? Minimum Documentation ? 350 families already residing... ✔ School buses comes inside township... ✔ Green and maintain parks available...? Booking Amount- ₹ 1,00,000 ✔ Commons Area power backup  ✔ lift Available ✔ Landscaped gardens and 24 x 7 security ? पता: फतेहसागर से मात्र 2 मिनट की दूरी , प्रताप गौरव केन्द्र के पास , टाईगर हिल के सामने ,लैंडमार्क ट्रेजर टाऊन , मनोहरपुरा, बडगांव, उदयपुर -313011 कृपया एक बार फ्लैट देखने पधारें अथवा काॅल करे ☎️ 9309478032 See your favourite places on Google Maps. https://goo.gl/maps/9XTMEttB5ou","{\"bedrooms\": \"2\", \"bathrooms\": \"2\", \"building_age\": \"5\"}","2018-10-29 13:10:42","2018-10-29 13:10:42",NULL],
	[64,20,"Flat for sell","sell","apartment",2650,1685.00,"sqft",3,"[\"/storage/properties/8drJMOeryJz5hpGXTWdQAzZH4OaqDrEn0V817Cxb.jpeg\", \"/storage/properties/E36Pe7E7Z2QXFvCezJGFMauDs8N43LD5buLsPRNu.jpeg\", \"/storage/properties/eJTJgLY1O82ZBeAhxMQoePLdZh12BMp68Pek1faK.jpeg\", \"/storage/properties/OxThzbmmoQGOrqRFyE4MN4DTVH0vfW0LczIA9kgX.jpeg\", \"/storage/properties/PS2yBd61xbIQPflusxX4zKAs8SutW7wngHNaw267.jpeg\", \"/storage/properties/jCA1urHofQdip8qynLJz9LvjFXPtMqwZTkzMLfeD.jpeg\", \"/storage/properties/4HYgMct1RHv4E8UseaqQeVs9Zfz1O0qnRIJEcTDl.jpeg\"]","Near Celebration mall","Udaipur","Rajasthan",313001,"3BHK flat is available for sell near celebration mall Udaipur. Price is negotiable.","{\"bedrooms\": \"3\", \"bathrooms\": \"2\", \"building_age\": \"5\"}","2018-11-01 14:18:18","2018-11-01 14:18:18",NULL],
	[65,58,"Shree SIDDHI VINAYAK VIHAR balicha","sell","plot",700,1000.00,"sqft",NULL,"[\"/storage/properties/sOVNN8VjlCb5QJEo7NCNwZtsCU4boeigSnNAk7kD.jpeg\", \"/storage/properties/ZnNpJsr0V0HrVeb5b4ES8LUx3nZpV2n60Ctj8Etk.jpeg\", \"/storage/properties/41FTlTcfdBNlKuXVTEPN7J9r25kfSdDfMbrkkHQ0.jpeg\", \"/storage/properties/PRUpaxUTizGeGcFQAd8xs6Irg4uzNZCV76SQldAd.jpeg\", \"/storage/properties/fFumsWNGa1UoNgpdwrA29dPR8VsdVbFMpJ05DgkD.jpeg\", \"/storage/properties/dLFUdt94Otqs1NGtQANNCyWJxkKto2L4WR1PKDvf.jpeg\"]","Balicha 200ft road ke pass bihind IIM Udaipur near new krishi mundi","Udaipur","Rajasthan",313001,"Balicha mei new krishi mundi ke pass  Udaipur ke sabse bade 200 ft road ke pass  IIM Udaipur ke pitche Nivesh karne Ka sunehra avsar Shree SIDDHI VINAYAK VIHAR","{\"converted\": \"converted\"}","2018-11-01 14:38:42","2018-11-01 14:38:42",NULL],
	[66,61,"3 Bhk Flat, prime location","sell","apartment",7000000,1760.00,"sqft",3,NULL,"202,sec 4,manokamna apartment,above SBI bank,in front of samudayik bhavan","Udaipur","Rajasthan",313002,NULL,"{\"bedrooms\": \"3\", \"bathrooms\": \"3\", \"building_age\": \"5\"}","2018-11-02 06:21:30","2018-11-02 06:21:30",NULL],
	[67,64,"Gariyawas 60 ft road","sell","commercial",6500,4200.00,"sqft",NULL,"[\"/storage/properties/qeIeKSD59TCSnRWFddRfADJyhdoJR0LPMAgqdm0k.jpeg\"]","Gariyawas 60 ft road udaipur","Udaipur","Rajsthan",313001,"Price is 2 crore 73 lakh rupees need to urgent sell. Area rate is 7600. Best location placed. 4200 sqr ft plot 42×100. Comercial converted.",NULL,"2018-11-03 07:56:38","2018-12-26 05:04:48",NULL],
	[68,65,"House","rent","house",6000,500.00,"sqft",2,NULL,"Sector 6 nr sai baba temple","Udaipur","Rajasthan",313002,NULL,"{\"bedrooms\": \"2\", \"bathrooms\": \"1\", \"building_age\": \"5\"}","2018-11-03 10:29:10","2018-11-03 10:29:10",NULL],
	[69,66,"Urgent Plot Sale","sell","plot",900,2492.00,"sqft",NULL,NULL,"Umarada, Near Kanpur","Udaipur","Rajasthan",313001,"Plot for sale in umarada near kanpur on urgent basis. Property dealer & genuine buyer both are welcome. Total Size: 2492 sqft, Rate: 900/- per sqft. Contact: 6350035273, 6350066957, 6375579066","{\"converted\": \"converted\"}","2018-11-03 12:27:53","2018-11-03 12:29:22",NULL],
	[70,63,"Residencial convert","sell","land",115,8.00,"bigha",NULL,"[\"/storage/properties/CtJm6TFFso1OUdLqM7ptZqaYsVkbOVZDxTsnl5oV.jpeg\"]","Chirwa goan","Udaipur","Rajasthan",313001,"Chirwa goan me highway se 3 km andar residencial convert land sale krni he puri boundary wall tarbandi ke sath ek semi complete 2 room kitchen latbath house bana hua he 8000 sq feet pr teen shade kia hua he or ek tubewell kia hua he Contact person:- Mr. Amit dwivedi  Mobile number:- 9828157102","{\"converted\": \"converted\"}","2018-11-05 13:03:44","2018-11-05 13:03:44",NULL],
	[71,70,"4 BHK Duplex Bunglow with Large Parkingnr Sajjan Garh","sell","house",11000000,1750.00,"sqft",4,"[\"/storage/properties/PkD9DSeqX383yxa0QDH4Aeod0hS2u3zEfHM0IZDb.jpeg\"]","Sajjan Nagar .behind Mewar Garh Hotel and Resort","Udaipur","Rajasthan",313001,"4 BHK Duplex Bunglow with Large Parking nr Sajjan Garh For Sale ..The Property is situated in  a very peacefully Society near Sajjan Garh behind Mewar Garh Hotel and Resort at a Price of 1Cr and 10 lakhs negotiable..All rooms have latest Bathrooms  and Big Rooms","{\"bedrooms\": \"4\", \"bathrooms\": \"4\", \"building_age\": \"1\"}","2018-11-10 20:03:08","2018-11-10 20:03:08",NULL],
	[72,71,"Plot","sell","plot",300,1800.00,"sqft",NULL,NULL,"Near Udaipur cement factory, mavli road , Udaipur","Udaipur","Rajasthan",313001,"1800 sq feet plot for residential and commercial purpose. Near by Dabok and very nearby of Udaipur international airport. All facilities are available near it like patrol pump, bank etc. Only 500 meters inside from highway road.","{\"converted\": \"converted\"}","2018-11-11 11:44:55","2018-11-11 11:44:55",NULL],
	[73,20,"Office space for rent.","rent","commercial",15000,350.00,"sqft",NULL,"[\"/storage/properties/EeLDXK7OL3zo9HCufRWdFfUgmvALZs0eHdBHSDmY.jpeg\", \"/storage/properties/ipukiJViFWKPrkdX5bN9bVOMCrvIzG9yUVtMRKQ6.jpeg\", \"/storage/properties/bl6RLpgiy3bj2Xk7YLfjoKRiYAxtKzkf5DITs5Do.jpeg\", \"/storage/properties/qMawVZSdXTA8SZIseXdVtvYKARrDlGY20GFAmrPX.jpeg\", \"/storage/properties/mC2E05vWFCeQfSeAmlbN4T1QsfBCmnWaQufBQWcW.jpeg\"]","Sect 3 main Road","Udaipur","Rajasthan",313001,"350 sqft space for office is available for rent. Basement parking is available. Rent is negotiable",NULL,"2018-11-20 07:40:33","2018-11-20 07:40:33",NULL],
	[76,83,"Matra chaya sector 12","sell","house",11000000,3000.00,"sqft",8,NULL,"2 deepmala complex, behind rseb, savina kheda, sector 12","Udaipur","Rajasthan",313001,"Very familiar environment","{\"bedrooms\": \"4\", \"bathrooms\": \"8\", \"building_age\": \"10\"}","2018-11-24 11:15:46","2018-11-24 11:15:46",NULL],
	[77,83,"Matara chaya rent sector 12","rent","house",9000,1400.00,"sqft",2,NULL,"2 deepamala complex, behind rsrb, kumawat colony, sector 12","Udaipur","Rajasthan",313001,"Nice family enviromnet","{\"bedrooms\": \"2\", \"bathrooms\": \"3\", \"building_age\": \"10\"}","2018-11-25 10:46:14","2018-11-25 10:46:14",NULL],
	[78,83,"Matra chhaya rent 3500 sector 12","rent","house",3500,500.00,"sqft",1,NULL,"Savina","Udaipur","Rajasthan",313001,"Environment","{\"bedrooms\": \"1\", \"bathrooms\": \"1\", \"building_age\": \"10\"}","2018-11-25 10:49:17","2018-11-25 10:49:17",NULL],
	[79,84,"Land at janakpuri bedwas","sell","land",3375000,1500.00,"bigha",NULL,NULL,"Janakpuri","Udaiput","Rajasthan",313001,"1500x2250=3375000 uit converted","{\"converted\": \"converted\"}","2018-11-27 15:13:19","2018-11-27 15:13:19",NULL],
	[80,86,"Uit convert plot","sell","plot",1100,1000.00,"sqft",NULL,"[\"/storage/properties/cY6QlNyliNBqK887p07Xjf4vQGWEvtpvAzGqGCHD.jpeg\"]","Phanda titardi","Udaipur","Rajasthan",313002,"Very good chance to have a property in smart city UDAIPUR in phanda Titradi in very low price. just 3 PLOT remaining all others are sold out.plots are- UIT APPROVED CLEAR TITLE/PAPERS READY TO REGISTRY LOANABLE NEAR BY 100 FT AND 200 FT ROAD READY TO MOVE URJENT FOR SALE. PLZ CONTACT-9351062940","{\"converted\": \"converted\"}","2018-11-28 06:21:18","2018-11-28 06:21:18",NULL],
	[81,20,"aa","sell","house",42,14.00,"sqft",2,NULL,"51, ROAD NO. 2 ANAND VIHAR, TEKRI MADRI LINK ROAD, NEAR SATYAM SHIVAM SUNDARAM","Udaipur","RAJASTHAN",313001,"dsfsf","{\"bedrooms\": \"2\", \"bathrooms\": \"2\", \"building_age\": \"5\"}","2018-11-29 07:32:06","2018-11-29 07:32:06",NULL],
	[82,89,"3BHK available for RENT at Keshav Nagar","rent","apartment",11500,1680.00,"sqft",3,"[\"/storage/properties/MmBTUNn35Nuc1mdDqmvHVSwFnGMkiIx4cGQZWTyE.jpeg\", \"/storage/properties/CfEJNZOgSOymopereWwPmkUFQy34IHwBuRwoNqP2.jpeg\", \"/storage/properties/M7r1aUMzoKROettVojyhfBHGgJOtJ9ixn2A15L7g.jpeg\", \"/storage/properties/W0FX1cZ500vbw06XGOi1wn2kmUjGDOrjWOVSHz3Y.jpeg\", \"/storage/properties/Bu9wUmZ7PlA86PUH7zruqur8rd2OPsGuFHWGcZLy.jpeg\", \"/storage/properties/YA43OJdXfPeOv8DVEyXprA1bOhba4XTmGdh6FAFv.jpeg\"]","Keshav Nagar","Udaipur","RAJASTHAN",313001,"Flat is 1 km from Sobhagpura Circle and 1.5km from University Road..Ready possesion","{\"bedrooms\": \"3\", \"bathrooms\": \"3\", \"building_age\": \"5\"}","2018-12-01 11:58:55","2018-12-01 11:58:55",NULL],
	[83,95,"UIT CONVERTED Samta Vihar Tirardi","sell","plot",1650,2100.00,"sqft",NULL,NULL,"Samta vihar titardi","Udaipur","Rajasthan",313001,"Uit plot 2100 sq ft Loanable Colonization going on full swing in samta vihar. Good opportunity in just rs 1650 per sqft Samta vihar Titardi Udaipur","{\"converted\": \"converted\"}","2018-12-16 18:09:04","2018-12-16 18:09:04",NULL],
	[84,97,"Converted","sell","plot",3000,1250.00,"sqft",NULL,NULL,"Ambe colony, Goverdhan vilas, sector 14","Udaipur","Rajasthan",313002,NULL,"{\"converted\": \"converted\"}","2018-12-20 16:14:23","2018-12-20 16:14:23",NULL],
	[85,96,"Freehold","rent","apartment",30000,1771.00,"sqft",3,"[\"/storage/properties/0XOA9LbU71j6UZhB7uFeSeFKMQs1HeXWBlCEPwnI.jpeg\", \"/storage/properties/M23CaaNGp3ETtpDw4t2Ld9nDE6BqR35pV04QSmZ5.jpeg\", \"/storage/properties/V1dNYSSf3UPHjy7bLiwEIQuIjPKCdA9W5NB37xMA.jpeg\", \"/storage/properties/0HPGs49MvmZIYS4yyArvjB5G7NxTRFYJhfnfPSNI.jpeg\", \"/storage/properties/LZCIRaNANayQevSRYsDTZ9kNbpDkKMUWxHBSeUhw.jpeg\", \"/storage/properties/IYuTH8gZ5cgfMlvxMz5SAYhoKCKPJMo3GLuwOkLg.jpeg\", \"/storage/properties/V2fBs1lJghELcwM8iHWQkeB2bYwbPP52OluJktdG.jpeg\", \"/storage/properties/17ugxUbrurDqu9N21mQm2jL1PQZjnQLtzBV4fmzf.jpeg\", \"/storage/properties/4dSCKjoZqZvzt7IbysMLGSyMKDnUFfWqf2GPXceI.jpeg\"]","907 SKYB RSG UNIVERSE","Udaipur","Rajasthan",313001,"Fully furnished with 4slit AC, bath tub,geyser, inverter,false ceiling,with cupboard and full furniture","{\"bedrooms\": \"3\", \"bathrooms\": \"3\", \"building_age\": \"5\"}","2018-12-21 08:58:25","2018-12-21 08:58:25",NULL],
	[86,98,"Office space fully furnished","rent","commercial",25000,393.00,"sqft",NULL,"[\"/storage/properties/JJyFlWqVWLPvQWy6yqSJfMu8ZIJ5qAmWMRfVT6gY.jpeg\", \"/storage/properties/jxcPQ6d704xvRkfjFawUtHuuAfVd2PixuGcVPwLd.jpeg\", \"/storage/properties/wE75vXxJKFE0vNRMXPYMkRdBw17YtJJLhwUCzzMu.jpeg\"]","616 mangalam Fun Squire","Udaipur","Rajasthan",313001,"393 Super Build up  office, one big boos chembar, 6to 7 person sitting with all facility  with AC",NULL,"2018-12-21 12:06:43","2018-12-21 12:11:57",NULL],
	[87,99,"2 bedroom, kitchen, let bath","rent","house",7000,1000.00,"sqft",2,"[\"/storage/properties/xMlC9MtiKOUNATUDpitMAvd7LFCHiECD2SRvldFA.jpeg\", \"/storage/properties/gClJeKYFmdEnr3AQbrb6pNrX1k4mUjEqLBQ3SguZ.jpeg\"]","Neminath colony, new track nagar, nokha road, H.M. sec 3","Udaipur","Rajasthan",313002,"2 bedroom, kitchen, let bath, store available for rent  Note: preference to JAIN or Brahmin family","{\"bedrooms\": \"2\", \"bathrooms\": \"1\", \"building_age\": null}","2018-12-21 14:01:08","2018-12-21 14:01:08",NULL],
	[88,102,"7000 square feet shed and open space","rent","land",60000,7000.00,"sqft",NULL,"[\"/storage/properties/CfOaPsFCLCwb25pv3S6rRrdBMN8Y2FlsSwJFd6Kt.png\", \"/storage/properties/61K7Es3VQi0ORnURQgSKoinsftmYt3t7kWRkPkoA.png\", \"/storage/properties/RGpVcFFx20UzTPF4exS7LbOXBK2ysAxtT5xy7dEh.png\"]","Gudli industrial area (saloni kanta)","Udaipur","Rajasthan",313001,"7000 square feet shed available with good location with light connection  And open space at gudli main road  At saloni kanta","{\"converted\": \"converted\"}","2018-12-22 10:32:24","2018-12-22 10:32:24",NULL],
	[89,108,"Hall available on Rent at Vellyview Hotel, Transport Nagar, Pratapnagar, Udaipur","rent","paying-guest",48000,5000.00,"sqft",NULL,"[\"/storage/properties/wlydCsgj3RtCBGk0nvR65Xbh850fTY8ZmtblZmGv.jpeg\", \"/storage/properties/Pzgg3ccLDXSXTiP25TuPvWBCZj1xII07vewiv6XJ.jpeg\", \"/storage/properties/HoQDFFB3fzsiBfJT6Bz5Lx4xAsHCPj6jIosUO1dc.jpeg\", \"/storage/properties/hUwIt4SKcjoTM1PftAqjnC5xVa7iBDXu2qUjeNyz.jpeg\", \"/storage/properties/cCDim2GoIuwhP5sZO5K4x1hq53OTrMxha6HEocSd.jpeg\", \"/storage/properties/aYMGXsCTdr66GfxOo0M5HUdW7ONHJUzbs9kO0UNK.jpeg\", \"/storage/properties/IN2LV6SWvlAoKwgUYXpKXLdLKhRKeqRnGy0EpH19.jpeg\", \"/storage/properties/ub8ZOIhWEmXoOSzH9tBtM8lo9LTL1eEzfmVCijgx.jpeg\", \"/storage/properties/2do4vEii6ik6IHIup7lEHpmsFRRPNnbTnmle1ga7.jpeg\"]","Airport Road, Nr. Maa Gayatri Hospital, Vellyview Hotel, Transport Nagar, Pratapnagar, Udaipur","Udaipur","Rajasthan",313001,"Want to rent Hall Area 5000 sq ft and 4000 sq ft Parking Area, 3 Wash Room, Comfortable Place for B'day parties, Business Meetings, Conferences etc.. Call:7426887925 Address:- Airport Road, Nr. Maa Gayatri Hospital, Vellyview Hotel, Transport Nagar, Pratapnagar, Udaipur",NULL,"2018-12-29 13:36:28","2018-12-29 14:04:46",NULL],
	[90,108,"1500 Feet Plot Or 3500 Constructed Area at Nakoda Nagar, Pratapnagar, Udaipur,","sell","house",12000000,1500.00,"sqft",3,"[\"/storage/properties/IAdQ6XNAYMa0hIvw0MWE7AdF0hjGdpiIpEoNUE9o.jpeg\", \"/storage/properties/qsRtm4hBpzTj1z3bWtgwhAzupUrUyyDesMrfRTKp.jpeg\", \"/storage/properties/0jrdwyEuVaRFD9rcKtCx3DBTiz5bhTDbWXfEaTZ8.jpeg\", \"/storage/properties/wnWG7du0CxHXWKGaWtRxKEJlopXh8bs2CiS6BLWD.jpeg\", \"/storage/properties/GQAoOlxZekJA2UfMyB1sDVIx70owQFwOOSdHFlro.jpeg\", \"/storage/properties/gD6TCC0NQv39cWX6hS19fLiBoLxArEvDxe3BNk8A.jpeg\", \"/storage/properties/22CxF1SEk93wwTLgBHJQ1txtPpPWyrV72kbFlcbb.jpeg\", \"/storage/properties/3G85jrAWdVqAI3PajiFqiHTrJyxZw1rECWyzWPyZ.jpeg\", \"/storage/properties/eBE1oAoL0glpEomIIVWaIDIoxdVjKzKKRb8EiFLA.jpeg\", \"/storage/properties/3WxZK1AGySaXlv9DO3fRAP679TWUfVB3xmZMiCwQ.jpeg\"]","Nakoda Nagar, Pratapnagar, Udaipur, Rajasthan","Udaipur","Rajasthan",313001,"Cost : ₹1.20Cr Fully Furnished interior  AC House​  1500 Feet Plot Or 3500 Feet Slab Area Ground Floor - 3 BHK + 3 Bathroom First Floor - 3BHK + 3 Bathroom Rooftop - 1 Big Bath Room + Hot Solar Water Heater Area Developed With Royal House Location: Nakoda Nagar, Pratapnagar, Udaipur, Rajasthan , Call:7426887925","{\"bedrooms\": \"5\", \"bathrooms\": \"6\", \"building_age\": \"1\"}","2018-12-29 13:44:35","2018-12-29 14:00:59",NULL],
	[91,112,"Residence","sell","house",210000,1000.00,"sqft",2,"[\"/storage/properties/plxT3NGQCTl3iolCN4TXazTI8vGJNbA1EMYmWJX6.jpeg\"]","Udaipur","Udaipur","Rajasthan",313301,NULL,"{\"bedrooms\": \"2\", \"bathrooms\": \"2\", \"building_age\": \"1\"}","2019-01-02 02:58:00","2019-01-02 02:58:00",NULL],
	[92,113,"Plot's & Farmhouse Near Tonk Road Jaipur !","sell","farmhouse",266,1.00,"sqft",NULL,"[\"/storage/properties/bdAuJ210onM8S75IHNEOXjU5xIUFDcH5JM4mChVW.jpeg\", \"/storage/properties/SJJ20J8xaIhUFSD7zKaSLvr6gxukjEnOFIAtsQef.jpeg\", \"/storage/properties/MIsNrirsRjHJnrVKlR9xtRFQXMFPnWsnj94BIYfL.jpeg\", \"/storage/properties/320TORBZGWloeIhe42kIkXbUU7lT0VorKwElXvKC.jpeg\", \"/storage/properties/NJJvbIrtVazIeZw340r07vLedehbqsUny9uhnGxD.jpeg\", \"/storage/properties/UNTgVMGqZwow96fsTWY5pRIzXNIVlb6hO8eIn3fB.jpeg\", \"/storage/properties/mwM2IeO82Ehwi1Z8bZKLlpAPvEPzjYJwZRo6vOgu.jpeg\", \"/storage/properties/eXTI0Vhs1LNAm03WN0ugIGhyQj6CVcdD1hwY48tN.jpeg\", \"/storage/properties/ZEMwwBlqfh98X3meB820e4ayBkdFeZbuHnmJQkso.jpeg\", \"/storage/properties/KGlpoFDd3N4cD6qHQ0BKTSAxj98cFZ8lSFQzXCzf.jpeg\"]","Sanjeevni Group","Jaipur","Rajasthan",302029,"Education Dev Collage		  		  3 Min. Drive Asian Institute of Technical		  3 Min. Drive Jagannath University			10 Min. Drive Vansthali Vidhyapeeth		20 Min. Drive  Greater Sitapura (Industrial Hub) 8 Min Drive 100 Sq Yard Plot only in 2.40 Lakh  500 Sq Yard Farmhouse only in 12 Lakh  Constructed Farmhouse only in 28 Lakh",NULL,"2019-01-02 11:54:24","2019-01-02 11:56:47",NULL],
	
	[93,113,"Plot's Near JNU Hospital Jagatpura !","sell","plot",13000,1.00,"sqft",NULL,"[\"/storage/properties/j6RWOefmirFOKnv6Osfn98PK9luhTuvlVrNcOoTj.jpeg\", \"/storage/properties/fDvbaxJxbFB1QVMZphlk30QThiQMbLxJ0nWgdS6B.jpeg\", \"/storage/properties/fwmLpVOmx3nI2HVwUvOynnAusnONar1cDmZd5cEa.jpeg\", \"/storage/properties/IxwQoM1shXRjTshzNRy4l557QFw6zyEs6kVx7tRo.jpeg\"]","Near JNU Hospital Jagatpura","Jaipur","Rajasthan",302029,"Near JNU Hospital Indra Gandhi Nagar Front Of Sector - 12 Full Developed Singal Gated Township  with all basic Facilities Damar Road, Electric lines ,Street Lights,Water Tank, Temple, Security guard It,s Society Project Not JDA Approved  Plot Size - 70 ,80,100 (gaj) ReSale-100 gaj Plot(13Lac 70(Gaj)Plot-11&Villa-21Lac 100(Gaj)Villa-30La Call- Kumar- 8875111105","{\"converted\": \"converted\"}","2019-01-02 12:26:31","2019-01-02 12:26:31",NULL],
	[94,114,"Plot For Sale on Zincsmeltar Debari (Udaipur) to Kurabad Mega Highway on road Property","sell","plot",375,3000.00,"sqft",NULL,NULL,"Napaniya Bus Stand,Near Bharat Gas Plant,Sakroda(Girva)","Udaipur","Rajasthan",313001,"I want to sell my Agriculture land on Mega Highway ,well developed area,total planing on opposite of Plot. Suitable land for both business and living purpose. Ground level water is less than 100 feet. 24 hrs light availability. 18 Km Distance from Surajpole Choraha. Bus,Auto,Transportation Facility 24 hrs available. General caste land Contact me 9636740378. Ravindra Singh Jhala","{\"converted\": \"agriculture\"}","2019-01-04 06:57:47","2019-01-04 07:01:06",NULL],
	[95,115,"2400 sqft semi furnished house","sell","house",13500000,2400.00,"sqft",3,NULL,"Mahaveer colony bedla road","Udaipur","Rajasthan",313011,"Semi furnished house in very good locality","{\"bedrooms\": \"3\", \"bathrooms\": \"3\", \"building_age\": \"20\"}","2019-01-04 08:29:04","2019-01-04 08:29:04",NULL],
	[96,117,"Farm House Land","sell","land",150000,20.00,"bigha",NULL,"[\"/storage/properties/Gc4dciQQfjLCFngQqOUEsdg9v37yAsyn7xHmcVir.jpeg\"]","200 Feet Bypass","Udaipur","Rajasthan",300301,NULL,"{\"converted\": \"agriculture\"}","2019-01-08 17:20:11","2019-01-08 17:20:11",NULL],
	[98,81,"Pooja vihar","sell","plot",451,1000.00,"sqft",NULL,"[\"/storage/properties/hygzTICpYB3fwv6NYhiv1LxdnhgHBpgThMbEsUu1.jpeg\", \"/storage/properties/d4rcYMqako6qQR3eW05m8KimY8kl3BnoFonZBNsH.jpeg\", \"/storage/properties/6bsFT9Y06yCG4Vib9L4BZfJO8EIydoAmqJRH3U7b.jpeg\", \"/storage/properties/TOAKDXGCwFkjtFnLe4DNJennmG11MGfxKgz861Jo.jpeg\", \"/storage/properties/Cmg96hrSRzSjINJGTw8VFFe183itKz8sFatEMbrg.jpeg\"]","Near by 300 meter umarda railway station","Udaipur","Rajsthan",313003,"Call:- 8949050671 स्मार्ट सिटी उदयपुर UIT क्षेत्र में आवासीय कन्वर्ट प्लांट मात्र 451/- SQFT से शुरू डामर रोड , पत्थरगढ़ी मार्किंग,प्लांटेशन,लाइट पोल्स,सभी मूलभूत सुविधायें युक्त, उमरड़ा ग्रोथ सेंटर , हॉस्पिटल, रेलवेस्टेशन, कॉलेज, के पास । आज ही अपना मकान बनाये।","{\"converted\": \"converted\"}","2019-01-13 08:28:42","2019-01-13 08:28:42",NULL],
	[99,121,"SDO CONVERTED","sell","land",411,20000.00,"bigha",NULL,NULL,"NEAR BSF NH76 KAVITA","udaipur","Rajasthan",313001,"20000 SQFT converted land sale  in kavita 300 meters inside from mount  abu highway NH76 the land area is converted into 2000- 3000 sqft plots and looking to sell individual plots.7568000222","{\"converted\": \"converted\"}","2019-01-23 06:50:33","2019-01-23 06:50:33",NULL],
	[100,123,"House on Sell at central area, Corner House.","sell","house",40000000,4000.00,"sqft",8,"[\"/storage/properties/R02abU4P1c30Yy3MABBmf1BoYpd3jY91zXBjGYbV.jpeg\", \"/storage/properties/Hii9xL1aBdWDkhyBpql1FgDJ9QBs1YLIEWGmke6x.jpeg\"]","7 Central Area","udaipur","Rajasthan",313001,"I have corner house in Central Area which on sell","{\"bedrooms\": null, \"bathrooms\": null, \"building_age\": null}","2019-02-01 08:50:18","2019-02-25 06:33:00",NULL],
	[101,98,"office space at 616Manglam Fun Squire","rent","commercial",25000,400.00,"sqft",NULL,"[\"/storage/properties/X57IL5RtuOpmNSXEWaDMcnXEhlxslw1fMzy1tFPI.jpeg\", \"/storage/properties/lvhwwIY5z9TvvofsyRuUPAd4mm12mTqvnymZQJMi.jpeg\", \"/storage/properties/CSJt69TmJjznXCBo9vsSMZptY1rtI9KtzxsN7hO8.jpeg\", \"/storage/properties/ArGMZPd5WnCmzjVhhSUsKrBfQLs2wH3dLGf8srK9.jpeg\"]","616 Manglam fun Squire","udaipur","rajastahn",313301,"fully furnished office  with AC and all office furniture one big boos chamber and 6 person sitting and small pantry",NULL,"2019-02-01 10:24:32","2019-02-01 10:24:32",NULL],
	[102,93,"Commercial","rent","commercial",100,3300.00,"sqft",NULL,NULL,"Udaipur","Udaipur","Rajsthan",313001,"3300 sf ground floor & 4700 sf on first floor available for lease on main tourist area",NULL,"2019-02-05 03:04:02","2019-02-05 03:04:02",NULL],
	[103,18,"For commercial use only","sell","plot",15000,950.00,"sqft",NULL,NULL,"Udaipur","Udaipur","Rajasthan",313001,"Plot for cell near celebration mall  on 150 feet road","{\"converted\": \"converted\"}","2019-02-18 15:50:24","2019-02-18 15:52:47",NULL],
	[104,132,"2bhk flate","sell","apartment",3700000,900.00,"sqft",2,NULL,"406 b block Divya jyoti apartment new Bhopal pura","Udaipur","Rajasthan",313001,"2 bhk well furnished flare with all... 2 Air-conditioning 1 sofa  2 double bed Geejar    fan  washing machine  refrigerator 42\" Sony tv For more details 9928006642 Price..  37 lakhs net For Brokers ...sorry","{\"bedrooms\": \"2\", \"bathrooms\": \"1\", \"building_age\": \"20\"}","2019-02-23 09:23:32","2019-02-23 09:23:32",NULL],
	[105,122,"Sunshine Boys Hostel","rent","hostel",4500,2000.00,"sqft",NULL,"[\"/storage/properties/yA7ZhwuVyWvAychNFBYgS1wz0JqErlzr3VVt50tu.jpeg\", \"/storage/properties/a6xV5FyNLmIb9huiab7wkA8eSmI9PJ6i8Yev2tK4.jpeg\"]","5 Ayad Main Road","Udaipur","Rajasthan",313001,"All Facility With Full Freedom 24*7 Water-Light , Breakfast , Lunch , Chai , Dinner , Bed-Mattress , RO Water , Free Wifi , Plate , Spoon , Glass , CCTV Camera , 100% Veg Food , Sunday Special Diet , Clean Homely Environment In Only Rs 4500/- Per Month",NULL,"2019-02-23 23:05:49","2019-02-23 23:05:49",NULL],
	[106,134,"Amberi","sell","plot",1300,1100.00,"sqft",NULL,"[\"/storage/properties/9Wdq6PND8gSkNk6sJiPQ5r2QsykNptZIlctf8sVK.jpeg\"]","Amberi","Udaipur","RAJASTHAN",313001,"Loaneble and uit converted, shreenath ji highway prime location","{\"converted\": \"converted\"}","2019-02-26 03:58:24","2019-02-26 03:58:24",NULL],
	[107,136,"Uit converted","sell","house",7700000,1250.00,"sqft",5,"[\"/storage/properties/SBep0d1F56YxksY9VoWuWmSN4JXitvapBPPuBBCT.jpeg\", \"/storage/properties/0SACD01xHvq6F4VCc3XuahHistFb1CvF0rd5InlP.jpeg\", \"/storage/properties/E3L5Lipk9dw7PX6Pe8YsL6XVIo6LvdrLyGTOyi1U.jpeg\"]","E147 prtapnagar","Udaipurrajasthan","Rajasthan",313001,NULL,"{\"bedrooms\": \"5\", \"bathrooms\": \"4\", \"building_age\": \"1\"}","2019-02-27 11:03:56","2019-02-27 11:03:56",NULL],
	[108,139,"Flat no. 521","sell","apartment",2750,1576.00,"sqft",3,"[\"/storage/properties/6E1xELEZzMfuPRBxYi1GYZi1mKCrbc3uSc2gGBxZ.jpeg\"]","Mahaveeram Appartment, Near Tulsi Niketan School, Kumbha Nagar HM Sec 4","Udaipur","Rajasthan",313001,NULL,"{\"bedrooms\": \"3\", \"bathrooms\": \"4\", \"building_age\": \"1\"}","2019-03-04 08:43:29","2019-03-04 08:43:29",NULL],
	[109,140,"House","sell","house",12000,4000.00,"sqft",11,NULL,"Mohan garh near sanchihar samaj haweli","Nathdwara","Rajasthan",313301,"Sale my legacy property in nathdwara. near by श्रीनाथ जी temple best location for hotel purpose investment.","{\"bedrooms\": \"10\", \"bathrooms\": \"10\", \"building_age\": \"50\"}","2019-03-05 14:13:39","2019-03-05 14:13:39",NULL],
	[110,140,"House","sell","house",12000,4000.00,"sqft",11,NULL,"Mohan garh near sanchihar samaj haweli","Nathdwara","Rajasthan",313301,"Sale my legacy property in nathdwara. near by श्रीनाथ जी temple best location for hotel purpose investment.","{\"bedrooms\": \"10\", \"bathrooms\": \"10\", \"building_age\": \"50\"}","2019-03-05 14:13:40","2019-03-05 14:13:40",NULL],
	[111,140,"House","sell","house",12000,4000.00,"sqft",11,NULL,"Mohan garh near sanchihar samaj haweli","Nathdwara","Rajasthan",313301,"Sale my legacy property in nathdwara. near by श्रीनाथ जी temple best location for hotel purpose investment.","{\"bedrooms\": \"10\", \"bathrooms\": \"10\", \"building_age\": \"50\"}","2019-03-05 14:13:40","2019-03-05 14:13:40",NULL],
	[112,141,"Uit full lonebal","sell","house",49000,865.00,"sqft",3,NULL,"Sector 9","Udaipur","Rajasthan",313001,NULL,"{\"bedrooms\": \"3\", \"bathrooms\": \"3\", \"building_age\": \"1\"}","2019-03-06 14:32:04","2019-03-06 14:32:04",NULL],
	[113,142,"Plot","sell","plot",4800,2720.00,"sqft",NULL,NULL,"Bhuwana","Udaipur","Rajasthan",313001,"UIT converted plot for sale at very prime location infront of mahapragya vihar 300 m away from 100 feet road and price is negotiable.","{\"converted\": \"converted\"}","2019-03-06 18:34:13","2019-03-06 18:34:13",NULL],
	[114,143,"For rent pg,office , coaching center","rent","paying-guest",60000,1000.00,"sqft",NULL,NULL,"100ft nakoda nagar ,hiran mahri sector 3","Udaipur","Rajasthan",313001,"In bottom its a showroom and 1st and 2nd floor is for rent. Anyone interested please contact 9414472056",NULL,"2019-03-09 06:40:49","2019-03-09 06:40:49",NULL],
	[115,145,"Mountain land in kasniyawad","sell","land",4500000,1.00,"bigha",NULL,NULL,"Kasniyawad near iswal","Udaipur","Rajasthan",313001,NULL,"{\"converted\": \"agriculture\"}","2019-03-25 07:02:19","2019-03-25 07:02:19",NULL],
	[116,146,"Arjent Sell My Big House","sell","house",9500000,2945.00,"sqft",4,NULL,"Gokul Village, sec -9, Savina baipas,bihaind Mahadev proparty","Udaipur","Rajasthan",313002,"2946 sqft total aria 2600 carpet aria East-sauth facing 4 bhk  2 kitchen 1 daining  2 drawing room 1Car Parking,boring, Nearest Gitanjli Hospital 1.5km Contect - Vikas Parmar - 8003137776","{\"bedrooms\": \"4\", \"bathrooms\": \"4\", \"building_age\": \"5\"}","2019-03-25 11:29:35","2019-03-25 11:29:35",NULL]
];

	$features_field = ['id', 'name', 'created_at', 'updated_at'];
	$this->features_data = $features_data = [
		[1, 'Air Conditioning', '2018-08-23 09:02:05', '2018-08-23 09:02:05'],
		[2, 'Swimming Pool', '2018-08-23 09:02:06', '2018-08-23 09:02:06'],
		[3, 'Garden', '2018-08-23 09:02:06', '2018-08-23 09:02:06'],
		[4, 'Parking', '2018-08-23 09:02:06', '2018-08-23 09:02:06'],
		[5, 'Furnished', '2018-08-23 09:02:06', '2018-08-23 09:02:06']
	];

	$pro_fea_asso_field = ['property_id', 'feature_id', 'created_at', 'updated_at'];
	$this->pro_fea_asso_data =  $pro_fea_asso_data = [
		[21, 2, '2018-09-12 10:04:32', '2018-09-12 10:04:32'],
		[21, 3, '2018-09-12 10:04:32', '2018-09-12 10:04:32'],
		[23, 3, '2018-09-16 13:35:14', '2018-09-16 13:35:14'],
		[23, 4, '2018-09-16 13:35:14', '2018-09-16 13:35:14'],
		[23, 5, '2018-09-16 13:35:14', '2018-09-16 13:35:14'],
		[26, 4, '2018-09-17 13:38:30', '2018-09-17 13:38:30'],
		[26, 5, '2018-09-17 13:38:30', '2018-09-17 13:38:30'],
		[27, 5, '2018-09-17 13:46:21', '2018-09-17 13:46:21'],
		[28, 3, '2018-09-17 13:48:58', '2018-09-17 13:48:58'],
		[28, 4, '2018-09-17 13:48:58', '2018-09-17 13:48:58'],
		[29, 4, '2018-09-17 13:51:05', '2018-09-17 13:51:05'],
		[30, 4, '2018-09-17 13:53:03', '2018-09-17 13:53:03'],
		[31, 3, '2018-09-17 13:55:45', '2018-09-17 13:55:45'],
		[31, 4, '2018-09-17 13:55:45', '2018-09-17 13:55:45'],
		[33, 4, '2018-09-17 14:01:57', '2018-09-17 14:01:57'],
		[33, 5, '2018-09-17 14:01:57', '2018-09-17 14:01:57'],
		[34, 4, '2018-09-17 14:04:51', '2018-09-17 14:04:51'],
		[35, 3, '2018-09-17 14:07:17', '2018-09-17 14:07:17'],
		[35, 4, '2018-09-17 14:07:17', '2018-09-17 14:07:17'],
		[35, 5, '2018-09-17 14:07:17', '2018-09-17 14:07:17'],
		[37, 1, '2018-09-18 07:26:43', '2018-09-18 07:26:43'],
		[37, 4, '2018-09-18 07:26:43', '2018-09-18 07:26:43'],
		[38, 3, '2018-09-18 12:14:43', '2018-09-18 12:14:43'],
		[38, 4, '2018-09-18 12:14:43', '2018-09-18 12:14:43'],
		[39, 3, '2018-09-18 12:22:07', '2018-09-18 12:22:07'],
		[39, 4, '2018-09-18 12:22:07', '2018-09-18 12:22:07'],
		[41, 4, '2018-09-18 19:51:20', '2018-09-18 19:51:20'],
		[41, 5, '2018-09-18 19:51:20', '2018-09-18 19:51:20'],
		[42, 4, '2018-09-18 19:52:47', '2018-09-18 19:52:47'],
		[42, 5, '2018-09-18 19:52:47', '2018-09-18 19:52:47'],
		[43, 4, '2018-09-18 19:55:53', '2018-09-18 19:55:53'],
		[43, 5, '2018-09-18 19:55:53', '2018-09-18 19:55:53'],
		[44, 4, '2018-09-18 19:57:51', '2018-09-18 19:57:51'],
		[44, 5, '2018-09-18 19:57:51', '2018-09-18 19:57:51'],
		[45, 3, '2018-09-19 11:20:02', '2018-09-19 11:20:02'],
		[45, 4, '2018-09-19 11:20:02', '2018-09-19 11:20:02'],
		[45, 5, '2018-09-19 11:20:02', '2018-09-19 11:20:02'],
		[48, 5, '2018-09-21 07:22:05', '2018-09-21 07:22:05'],
		[52, 4, '2018-10-16 03:01:55', '2018-10-16 03:01:55'],
		[53, 4, '2018-10-16 06:19:46', '2018-10-16 06:19:46'],
		[54, 4, '2018-10-16 06:19:48', '2018-10-16 06:19:48'],
		[55, 4, '2018-10-16 06:19:49', '2018-10-16 06:19:49'],
		[58, 4, '2018-10-22 09:09:51', '2018-10-22 09:09:51'],
		[58, 5, '2018-10-22 09:09:51', '2018-10-22 09:09:51'],
		[59, 4, '2018-10-23 10:12:09', '2018-10-23 10:12:09'],
		[63, 2, '2018-10-29 07:40:42', '2018-10-29 07:40:42'],
		[63, 3, '2018-10-29 07:40:42', '2018-10-29 07:40:42'],
		[63, 4, '2018-10-29 07:40:42', '2018-10-29 07:40:42'],
		[64, 4, '2018-11-01 08:48:18', '2018-11-01 08:48:18'],
		[66, 4, '2018-11-02 00:51:30', '2018-11-02 00:51:30'],
		[66, 5, '2018-11-02 00:51:30', '2018-11-02 00:51:30'],
		[68, 5, '2018-11-03 04:59:10', '2018-11-03 04:59:10'],
		[71, 4, '2018-11-10 14:33:08', '2018-11-10 14:33:08'],
		[73, 4, '2018-11-20 02:10:33', '2018-11-20 02:10:33'],
		[76, 1, '2018-11-24 05:45:46', '2018-11-24 05:45:46'],
		[76, 3, '2018-11-24 05:45:46', '2018-11-24 05:45:46'],
		[76, 4, '2018-11-24 05:45:46', '2018-11-24 05:45:46'],
		[76, 5, '2018-11-24 05:45:46', '2018-11-24 05:45:46'],
		[77, 3, '2018-11-25 05:16:14', '2018-11-25 05:16:14'],
		[77, 4, '2018-11-25 05:16:14', '2018-11-25 05:16:14'],
		[78, 4, '2018-11-25 05:19:17', '2018-11-25 05:19:17'],
		[81, 1, '2018-11-29 02:02:06', '2018-11-29 02:02:06'],
		[82, 3, '2018-12-01 06:28:55', '2018-12-01 06:28:55'],
		[82, 4, '2018-12-01 06:28:55', '2018-12-01 06:28:55'],
		[85, 1, '2018-12-21 03:28:25', '2018-12-21 03:28:25'],
		[85, 2, '2018-12-21 03:28:25', '2018-12-21 03:28:25'],
		[85, 3, '2018-12-21 03:28:25', '2018-12-21 03:28:25'],
		[85, 4, '2018-12-21 03:28:25', '2018-12-21 03:28:25'],
		[85, 5, '2018-12-21 03:28:25', '2018-12-21 03:28:25'],
		[86, 1, '2018-12-21 06:36:43', '2018-12-21 06:36:43'],
		[87, 4, '2018-12-21 08:31:08', '2018-12-21 08:31:08'],
		[89,3,'2018-12-29 13:36:28','2018-12-29 13:36:28'],
		[89,4,'2018-12-29 13:36:28','2018-12-29 13:36:28'],
		[89,5,'2018-12-29 13:36:28','2018-12-29 13:36:28'],
		[90,1,'2018-12-29 13:44:35','2018-12-29 13:44:35'],
		[90,3,'2018-12-29 13:44:35','2018-12-29 13:44:35'],
		[90,4,'2018-12-29 13:44:35','2018-12-29 13:44:35'],
		[90,5,'2018-12-29 13:44:35','2018-12-29 13:44:35'],
		[91,1,'2019-01-02 02:58:00','2019-01-02 02:58:00'],
		[91,3,'2019-01-02 02:58:00','2019-01-02 02:58:00'],
		[91,4,'2019-01-02 02:58:00','2019-01-02 02:58:00'],
		[91,5,'2019-01-02 02:58:00','2019-01-02 02:58:00'],
		[92,1,'2019-01-02 11:54:24','2019-01-02 11:54:24'],
		[92,2,'2019-01-02 11:54:24','2019-01-02 11:54:24'],
		[92,3,'2019-01-02 11:54:24','2019-01-02 11:54:24'],
		[92,4,'2019-01-02 11:54:24','2019-01-02 11:54:24'],
		[92,5,'2019-01-02 11:54:24','2019-01-02 11:54:24'],
		[95,3,'2019-01-04 08:29:04','2019-01-04 08:29:04'],
		[95,4,'2019-01-04 08:29:04','2019-01-04 08:29:04'],
		[95,5,'2019-01-04 08:29:04','2019-01-04 08:29:04'],
		[101,1,'2019-02-01 10:24:32','2019-02-01 10:24:32'],
		[101,5,'2019-02-01 10:24:32','2019-02-01 10:24:32'],
		[102,4,'2019-02-05 03:04:02','2019-02-05 03:04:02'],
		[104,1,'2019-02-23 09:23:32','2019-02-23 09:23:32'],
		[104,5,'2019-02-23 09:23:32','2019-02-23 09:23:32'],
		[107,4,'2019-02-27 11:03:56','2019-02-27 11:03:56'],
		[108,2,'2019-03-04 08:43:29','2019-03-04 08:43:29'],
		[108,3,'2019-03-04 08:43:29','2019-03-04 08:43:29'],
		[108,4,'2019-03-04 08:43:29','2019-03-04 08:43:29'],
		[112,4,'2019-03-06 14:32:04','2019-03-06 14:32:04'],
		[112,5,'2019-03-06 14:32:04','2019-03-06 14:32:04'],
		[116,4,'2019-03-25 11:29:35','2019-03-25 11:29:35']
	];


	$user_data = [
		[6, 'deepmala choudhary', 'deepmala_139@yahoo.co.in', '8769488655', '$2y$10$FCow/bp//.bR0A8nE2/uCOqixX8sYzl4yVcwRc1eq5ght0Ywwf.Dq', NULL, NULL, NULL, '2018-09-08 11:25:41', '2018-09-08 11:25:41'],
		[7, 'Nitin Jain', 'nitinkanthalia@gmail.com', '9214456424', '$2y$10$pFQCa1z03ggVL9Ap5n5nduOPD.03bwgaIXG1dlI3bn9no53MUjC82', 'FzP3gqKubjXYOACHfMmXEjSs203MkNNCRjKPYN5SIuXqhM2NSNZqgx6mhMx4', NULL, NULL, '2018-09-09 08:46:36', '2018-11-26 04:21:02'],
		[8, 'vijay jaiswal', 'jaiswalvijay26@gmail.com', '919929681820', '$2y$10$GPDewx2/hCWbFGDEucPjN.fcFD3qj.CoDzPYTOmQb3hj8egcAT3MG', 'n28YuZTmGPJI5acwr83WoLLbO2a4ao7UWb23OFzlrJfzH1qLp1UQmMjoNeQ9', NULL, NULL, '2018-09-10 04:37:06', '2018-09-10 04:37:15'],
		[9, 'Monodeep Nanda', 'Monodeep.nanda@gmail.com', '9461092002', '$2y$10$E.MzlOXsGGSd6FDyCUYicOSoRLcULkwEDmEhKOF7cOKUqz5088P6u', NULL, NULL, NULL, '2018-09-11 21:49:47', '2018-09-11 21:49:47'],
		[10, 'niyati kothari', 'niya.jain21@gmail.com', '9799143717', '$2y$10$.VqEHPviyIFipHfx1myEwun/hJwlSJxlzCNyNMd5bc/VZChtASoEK', 'sGPrPv3MhkENmBNg9H27AjZh8ywbZFCadYDdsBSZ9zG1TNwptNX4nkA888zT', NULL, NULL, '2018-09-12 10:13:32', '2018-09-17 13:29:18'],
		[11, 'Amrish Bhatnagar', 'amrishbhatnagar@gmail.com', '8949097570', '$2y$10$YVEHY1PBZTdTIG0FqQjR5eoOjHGC3mR0bp5njGF.rt7cRNlVzQwQe', 'tfLB9Jgqe2TqmriaGUKuGZpxktDLr5EoOuN92r9ApLDYxxLQxbwUOenLuKvz', NULL, NULL, '2018-09-12 13:40:06', '2018-09-12 13:40:21'],
		[12, 'Vikash', 'Vikash.matolia1112@gmail.com', '9001050424', '$2y$10$Web5hrA2BqD847A2M7e5/.n7mXKD416aLP9jCdL5OnzOlAYAILN7C', NULL, NULL, NULL, '2018-09-13 08:52:19', '2018-09-13 08:52:19'],
		[13, 'VYOMANH HOMESTAY & RESORT', 'vpgkota@gmail.com', '6350468609', '$2y$10$gBXPoF2IMak15I/84IE./uh1bKJ9Uiku8guLrjyz2CURFLan7sOJm', 'b7uMZ8JnAtBMrxytAesPjtp30qGtmAvnkDjzXP51v8Qf5UF5YiEI3WjaYOo5', NULL, NULL, '2018-09-16 21:39:35', '2018-09-16 21:40:51'],
		[14, 'Piyush', 'Piyush.piyush.choudhary@gmail.com', '7737988197', '$2y$10$N5PRywicvLLarIAOsaenKu3ABMhnURtyum4ueqWsSv57DPyzTOv8C', NULL, NULL, NULL, '2018-09-16 22:13:13', '2018-09-16 22:13:13'],
		[15, 'K.L.Sahu', 'spp0071@gmail.com', '8107529768', '$2y$10$lW0roLuz7eYLRFzJsC10l.60GOe8sarI6d.feCMsCI/oHSfpvPtZO', NULL, NULL, NULL, '2018-09-17 02:54:20', '2018-09-17 02:54:20'],
		[16, 'Manvendra Singh Rao', 'manvendrasinghrao@gmail.com', '0000000000', '$2y$10$HFWKcGLSQZ2m.TKqiP65wOKgtj/DNspEhk8/aYMliLMi.DlqAlCQS', 'Sgs2miOLllAFcPalDsj7KEQ3zaQ10seY3P2HAhXjMR2G9cHAiRaAckmYDKrB', NULL, NULL, '2018-09-18 19:48:23', '2018-09-18 19:48:23'],
		[17, 'Himmat Singh kothari', 'himmatsingh.kothari28@gmail.com', '9413021330', '$2y$10$CSGCsKQTNOp2/RIfW.sCGuLjqcc3enft0O3DooWl0Kdo.yAyESs1G', '2l9P9mBmSdwczt2lJLcnK3pnnQcaITlnjfQKBMMy08IkoTjiGHiz8WftMSMe', NULL, NULL, '2018-09-19 11:17:59', '2018-09-19 11:17:59'],
		[18, 'Nitin', 'nitinnenawa28@gmail.com', '9799504999', '$2y$10$/0XabiB1nOPytceqZ6GS5u6BCmPwA6m74Y8faK2bPPkUZ8GjEaqwm', '4oTyZEODLZCIsUzQAXyjYLHW4KPeNjqgzfkekKa8J9nb2IzYnReZw2qeQiFa', NULL, NULL, '2018-09-20 12:26:38', '2018-09-20 12:26:38'],
		[19, 'Mahaveer', 'jainmahaveer98@yahoo.in', '9887575487', '$2y$10$T1hUpt2ON8olWm4JyjmZeOjLNCnNzrL.2mY6VYOmeCQ.wD5ck5NNS', NULL, NULL, NULL, '2018-09-21 02:31:58', '2018-09-21 02:31:58'],
		[20, 'Sagar Kachhara', 'sagarkachhara@gmail.com', '8209132352', '$2y$10$tPn1yRUcgWO22CjkuYuIJ.OhiRicPD8gFxjKf2scYuvM6Hpv0nucq', 'Bbo6aZD1XMnkv9Ty71WbOK0YPinpKXKn21ibnJ2PjfyXeeLWXyZjGTS2bRSX', NULL, NULL, '2018-09-21 07:15:50', '2018-09-21 07:16:23'],
		[21, 'Dilip Bhatnagar', 'dilipbhatnagar09@gmail.com', '0000000000', '$2y$10$uWlkl1.6cLxWJ8ZzV2PnI.jIXmaCOthCX.4kli6.OZyI7GIZNsW9u', 'ip1pLebG6Xsrg6MMGckzJropQnHIAsgGSgCdg1FYpJlf1D41COHc9FQ053Uo', NULL, NULL, '2018-09-24 05:33:13', '2018-09-24 05:33:13'],
		[22, 'Ashish Bapna', 'bapna.ashish@gmail.com', '0000000000', '$2y$10$RGPS0YPBOMROPcBlMPMnCOqSuG04dbm3cFTceS.7qNms4zUyI0SDC', 'gHpii5p5UrbByIfOv52kQlrYbePB3KMRM13eYvzw8knZ58Qsba8MWcmL7AhK', NULL, NULL, '2018-09-26 12:25:06', '2018-09-26 12:25:06'],
		[23, 'Shweta Soni', 'shwetasoni2009@gmail.com', '8233818014', '$2y$10$GH.g8Uv52a23EzJBLJLS/.lGUvz9dFqKGVnqr8hcaKfjnQcwllFLe', NULL, NULL, NULL, '2018-09-27 11:40:49', '2018-09-27 11:40:49'],
		[24, 'Jaydeep singh rathore', 'Jaydeeprathore@ymail.com', '7665000886', '$2y$10$9cVLfunENmwn3Pt7oNRNRefMIcbpFUEYHNN.K8CsQc4IPvsKGXY.C', NULL, NULL, NULL, '2018-09-27 22:31:14', '2018-09-27 22:31:14'],
		[25, 'siddharth jain', 'siddsiddharth007@gmail.com', '0000000000', '$2y$10$un4kuw/1Cs.zotDpWe8Pje3PJWHQWoL2E3BhQg.4sMWGQoVLPd2A6', '1UFzvLTl2bxlrmoZ42VXy6qWNm6NuQHE5Xv6JUM6M50njWs9gviiAfsaJ8n9', NULL, NULL, '2018-10-13 04:03:43', '2018-10-13 04:03:43'],
		[26, 'Pankaj salvi', 'Pankajsalvi722@gmail.com', '8769945858', '$2y$10$TjFYXMqlpBcaBedXj1ke9.EzGfsumL/24vCOPV2MmEcHA0ZTK3rSW', NULL, NULL, NULL, '2018-10-13 04:46:56', '2018-10-13 04:46:56'],
		[27, 'Ankit Bapna', 'bapna.ankit@gmail.com', '8209423417', '$2y$10$LjEZMMUFMxigmSO70KNaL.Jo0BT37klolMqyU5ZwSXVpz4zW8e8cK', 'dv6W8SvpA8Q6wyLQXJ94vlhvSrLI5fku0ZtwVvhPQODYbYH1wdFVPtY5dDfH', NULL, NULL, '2018-10-13 06:16:35', '2018-12-22 04:21:43'],
		[28, 'Jay', 'maheshwari.jay1@gmail.com', '9413618658', '$2y$10$s6i43pWhslsefcPrR0Non.yEv29PWGvgEVaBm0mCDRqOlq37liBvi', NULL, NULL, NULL, '2018-10-14 05:59:59', '2018-10-14 06:00:39'],
		[29, 'Yudhishthir kumawat', 'Yudhikumawat@gmail.com', '9024283038', '$2y$10$4cSPiWF.ZVnjDeWrwgB6HeeFjxEr.CENOG3jfVpsRP9ZA9Nv42jiy', NULL, NULL, NULL, '2018-10-15 10:42:45', '2018-10-15 10:42:45'],
		[30, 'Deepak Nagda', 'deepaknagda1111@gmail.com', '9782260011', '$2y$10$TexuyPhVLz1YZlScXtZlPehn1nyiA3Jv2zskiQ3hKLYHpEJ.BcENy', 'gSaXLOaJcLzwYpQJqNB6V3WD2vQizML00kenGrczQ8EXfx3YgJBbz4XC4oH2', NULL, NULL, '2018-10-15 22:15:32', '2018-10-15 22:16:33'],
		[31, 'Ajay singh', 'chundawat.ajay@gmail.com', '7406279919', '$2y$10$PEr7KQdVzVbGaWYB9mznZO823Pwzc0SMxO88wYjDm4z6TKUUT3ur2', NULL, NULL, NULL, '2018-10-15 23:40:51', '2018-10-15 23:40:51'],
		[32, 'shilpa pandey', 'shilpapandey28@gmail.com', '8652520191', '$2y$10$d4vvASSmAq.pKieGX7t.suKbE5Nte26JVkFcIC8kF3guw638K1haa', 'aSrEMEpieE9a4Mt1nx4Nu0vyTvCYh414nBG68Y3Q0BzSomVrOSTKZmF7OAaO', NULL, NULL, '2018-10-16 02:54:04', '2018-10-16 03:00:14'],
		[33, 'bharat menaria', 'bharatm034@gmail.com', '9571392717', '$2y$10$FB9t.dasEGD2KdJ0kHMw/ePa0mn/THCHkOA.fHlWUT6BE1xip0P/.', 'DlFRC9PMjriGNoR3eTEaM3FlpNubcQC8kuug8zhmBAbiplhbDuaXyGCOWnaj', NULL, NULL, '2018-10-16 03:14:21', '2018-10-16 03:14:38'],
		[34, 'TARANG JAIN', 'jtarangjain@gmail.com', '7014864432', '$2y$10$gsKCj9tUm8S1Y.xhJ5Cd4e8A504tpDllDgPFa1yyEbRIFkdY4NeBa', 'UjRlAeie9yy4FzdVw4YKBf0ZPG7MgOsOnkfW6JFlBkvqlyqVwjNkk6ISbQn4', NULL, NULL, '2018-10-16 06:14:29', '2018-10-16 06:14:37'],
		[35, 'Jaideep Dudi', 'dudi94232@gmail.com', '8890098166', '$2y$10$NIVEd4wFYA86GSHAObkipObhHyLmZ8PFeTiNQwTH6QNQrRTOmfSR6', NULL, NULL, NULL, '2018-10-17 04:13:55', '2018-10-17 04:14:13'],
		[36, 'Himanshu Soni', 'himanshusoni7621@yahoo.com', '9828448698', '$2y$10$b9CCDJWC0Wz8VmUnTH465eS5y8AtxrCRfB2bfb1mgrXsHTx0Gx.8G', 'vrKpgtDKvVJ6yVp3UXoAE767dMPL18j0NujoXV9kV8cZOdJOLIJ2xwNTQRZM', NULL, NULL, '2018-10-17 07:26:05', '2018-10-17 07:26:05'],
		[37, 'paritosh kothari', 'kothariparitosh@gmail.com', '0000000000', '$2y$10$inKX1t.03HKdYhTlurRU4evJg0FA0nVC0o1lq3AutMNCeWLJ0XzXG', 'vToIF9kvO59QZFOSxZBt5sueyo3qbAZrkmboq1OSRkeSwU10yeSAfz703Sec', NULL, NULL, '2018-10-17 13:15:21', '2018-10-17 13:15:21'],
		[38, 'Bhawani Solanki', 'bhawanisolanki27@gmail.com', '9828181399', '$2y$10$I6puzRPjjcGIesear0MqIelE.RDGLnohRwCB5njAwJ56gaIEDWMj.', 'XgC7gHEK7Dpd75gvNWiH1VMUqhdYlEiahJFXQTnmJHNFvyV5yozURioKkRhK', NULL, NULL, '2018-10-19 05:15:19', '2018-10-19 05:16:16'],
		[39, 'Reenatank', 'Reenastank@gmail.com', '7568760645', '$2y$10$cqs7LOFpGISdXpBCWbzdQ.d/NfN0i0LRHPP4RmaJ9gZL78rBU0loK', NULL, NULL, NULL, '2018-10-20 03:57:24', '2018-10-20 03:57:55'],
		[40, 'Heena', 'dr.heenakm@gmail.com', '9660396505', '$2y$10$hJQU8vpcj5pjrWRvAWyLQuJ/sWoBcEApvzKIgrAfFkrBS2Sv8I/YK', NULL, NULL, NULL, '2018-10-20 07:57:23', '2018-10-20 07:57:23'],
		[41, 'Harish', 'Harishvaishnav1985@gmail.com', '8334895957', '$2y$10$0JUy4hFCdsyQNxrV8NR6nuV3Wj.66paaCUbfmSX9eoiNnY/w2dd8O', NULL, NULL, NULL, '2018-10-20 11:41:41', '2018-10-20 11:41:41'],
		[42, 'kishore singh kitawat', 'kish.kita8@gmail.com', '9694149414', '$2y$10$1kkfvM5eF4V.kjCBUQhq5.gLoE5z4IQG5SJxXUDCl/yfMvuhFz/Zu', '4biQwn2rYs1IEtDiM59pKtAQBl4XYMV0m29YLyYro9T20zvCGGLG2QzHUUeY', NULL, NULL, '2018-10-22 09:06:07', '2018-10-22 09:12:10'],
		[43, 'Rajesh Sharma', 'purvienterises2@gmail.com', '8769710551', '$2y$10$rYczipI2bXaLW1ZvzuY20OZ3rYGl.MA/jsJzevBbSHur8Eo9xdInm', 'udr3XQ1qaVW3p3xoAmt6RXt0rW38XWtG7nhqV6zUIdl3CxbmrTVkqMR16838', NULL, NULL, '2018-10-22 09:19:43', '2018-10-22 09:20:10'],
		[44, 'Yakin jain', 'Jain.yakin65@gmail.com', '8107043444', '$2y$10$DYfwzbiW6SuypbIGtOVnQuiim952Co7yg6c0NSu0LpabUz6srcMOK', NULL, NULL, NULL, '2018-10-22 09:23:47', '2018-10-22 09:23:47'],
		[45, 'Rajesh parihar', 'rajeshsinghparihar@gmail.com', '9929336224', '$2y$10$f5ddpPVhveQoecZ5rZy.fObUjFFERYBH1TMeZCQYSIqBKAFoOB5Y6', NULL, NULL, NULL, '2018-10-23 10:04:00', '2018-10-23 10:04:00'],
		[46, 'GT SINGH', 'gtsinghsingh@gmail.com', '9001283099', '$2y$10$uqjNxYAO9k.OWF7FPU18U.h3ADLjCO46ZqhcMY5BsYPJTqxw1taem', 'df9eQwcsK8CQckR0ARmjMZsyzX5NoRAHVjYat4w6Tu3ODcN7PkUtGlScRezv', NULL, NULL, '2018-10-25 01:49:14', '2018-10-25 01:49:38'],
		[47, 'Harshit mehta', 'harsaudr@gmail.com', '9828144372', '$2y$10$qgLRa8lVIszv4f7FLinekOD1LXbdumR9LCFnlp/3sniH3wECup9sS', NULL, NULL, NULL, '2018-10-25 07:28:14', '2018-10-25 07:28:14'],
		[48, 'Rahul goran', 'rahulgoran4@gmail.com', '9521362723', '$2y$10$okkc0cnkx2W14r4EPDQfM.grmOaOG91hIdBb34VUUYfpnb7Qpmq4e', NULL, NULL, NULL, '2018-10-26 02:02:14', '2018-10-26 02:02:14'],
		[49, 'Ratan Gharu', 'Barufishhome@gmail.com', '8875147129', '$2y$10$FfDMRA.uJTTxvBCdWP/93ubN3Bn0W9i9DkKtGisy.0zxvT5DlVHWe', NULL, NULL, NULL, '2018-10-26 02:36:23', '2018-10-26 02:36:23'],
		[50, 'Uday Gayri', 'gayriuday90@gmail.com', '0000000000', '$2y$10$f.xK1bacDpWFubSQrFsa4ewmgn1MGAmY237l7c.umiiI9pH3hbSkm', 'Y49VQdvN9UGZJR5VsQHt1UYgddoAVlMWttq3LUiDchEkTyRBaLfrXaF2UGJ2', NULL, NULL, '2018-10-26 05:06:07', '2018-10-26 05:06:07'],
		[51, 'Rakesh Sik', 'raksik1977@gmail.com', '9001078152', '$2y$10$IwsUu1Bq9rPdXYTRPZuH8.L7.QY5OQQR.8wO4jub01tEfMWJahgjW', '9x8ICGRVf2jgdhTIdpb5RCDLzrjv5aburq9soHK7chWaNpVGcm4a5w5udSBA', NULL, NULL, '2018-10-26 05:42:55', '2018-10-26 05:43:08'],
		[52, 'Abhinav Bansal', 'itsabhinav@yahoo.com', '9902399200', '$2y$10$UiMO3ICb7prgxoNKmZ9Iee2iR1OXJnhPFmi7yYRDyX3FjLFQLzkaC', NULL, NULL, NULL, '2018-10-27 00:59:55', '2018-10-27 00:59:55'],
		[53, 'Youvi Menaria', 'youvimenaria@gmail.com', '9587668597', '$2y$10$QU80Gh/txM4gt0KlUVWWOO8Ycg7tGkyi47ILtblaNyMW.Z2DHH8me', 'm1dC3ndhNUPfpAXVPe88tDh865tPKftBDBRvRXCELqRziKmrwlgJyuPnD77B', NULL, NULL, '2018-10-27 06:49:42', '2018-10-27 06:50:06'],
		[54, 'Bhupendra Jain', 'bhupendrajain2330@gmail.com', '9461383978', '$2y$10$PGmR5016tU7ogSTedNSD.OkDLjF.PgsA.JRqE0RlZDOMsa1vNoqVO', '6SiCZpNHIaX0XSYTEEZh85UyRZrnHHeiHeLdIRwG36H1b0PpHUuminmWzihD', NULL, NULL, '2018-10-28 02:29:27', '2018-10-28 02:29:52'],
		[55, 'Amit Malik', 'malik.amit47@gmail.com', '9309478032', '$2y$10$sUv3FOOvI6w3FRsBHlaHl.AzmyI8YXO2FsDLiznnVCF4ucVvGX0S6', NULL, NULL, NULL, '2018-10-29 07:37:21', '2018-10-29 07:37:21'],
		[56, 'LAlit Menaria', 'Harikripahealthcare@gmail.com', '8560967833', '$2y$10$IdwTFitidFfFTKPecI5ohuzG4Ol6nG3/wun4LsjeeQZIWYjnapEu2', NULL, NULL, NULL, '2018-10-30 01:28:52', '2018-10-30 01:28:52'],
		[57, 'Yudhi', 'Yudhishthir88@gmail.com', '8306053159', '$2y$10$XVM0k7mD4W25okEupwh76.jENxohop3eX110l3cr1B/ka5at6A1tW', NULL, NULL, NULL, '2018-11-01 08:21:07', '2018-11-01 08:21:07'],
		[58, 'abhay singh', 'abhaysinghdevda@gmail.com', '9829929998', '$2y$10$pUCay.oOweEZUmz8vylDX.DxLHWMK7yDg3Hi75RjXmNlTIaLNq4xO', 'W9Vwp63x5f0bwtlpeNSf4k4wL1k3wE6nINxGycMUhZptKSFepHc4ZoMZ3zfk', NULL, NULL, '2018-11-01 08:39:01', '2018-11-01 08:39:32'],
		[59, 'Jangir interior', 'pavan25121993@gmail.com', '9529406104', '$2y$10$d2pFHDYJOuwftj8dL0UpQeKNAUP/BuNVCqN8unp0pLvjMFi8b/7o6', 'Jebpt5onIUWT02TQoyOaHGOzOdTmH3TbjYBFm2isRIh4IJHTfBfrItKsTmBb', NULL, NULL, '2018-11-01 22:35:07', '2018-11-01 22:36:47'],
		[60, 'Gurjit Bahlan', 'gsbahlan@googlemail.com', '7568000222', '$2y$10$M1TDKTWruMAuMO9ctnrg0eRS4sIlKvXorQy3L7EQ3nw3VhCnEciY6', 'ZEJKV4Ats6VjRCCVjiib2qOLjkpVfnp8ROFyzoNqS6FyLnUrVozwvgQKZUF9', NULL, NULL, '2018-11-01 23:43:25', '2018-11-01 23:44:08'],
		[61, 'Deepali Kavdia', 'deepali.kavdia@gmail.com', '8233602798', '$2y$10$AvsghW.awTG5C3F4v4eo2.wpYEAngfYIb/wNrC0XxIiuGzQCBN35m', NULL, NULL, NULL, '2018-11-02 00:41:39', '2018-11-02 00:41:39'],
		[62, 'prakash kumar', 'prakashkumarcbe@gmail.com', '0000000000', '$2y$10$LgUqwSLVvXWqdvg.dGH.TOnvrzM3qL.WiOlgtJtrFbBzgPi3k5rz2', 'OPt3ATzD9FuqwC5JkwbQ3eiqtHiINMiJybqoyoGAs8qFWf1Mx2hVOVPP4kyd', NULL, NULL, '2018-11-03 01:26:28', '2018-11-03 01:26:28'],
		[63, 'Firoz Ibrahim', 'firozkhan.fk7080@gmail.com', '7727834007', '$2y$10$9Z4YKq8Jda1LijDn/6tq4.Z1BZ4EHwdX/Qk/wB/gbvLHVjmQLXd5W', 'CGjJiEhKVMD1aQBHRxCV2UBDht2Uog3uDrdZzCjFKixi56JV6JaFY4MhQ8Yg', NULL, NULL, '2018-11-03 02:07:23', '2018-11-03 02:07:54'],
		[64, 'Chandraveer Mali', 'chandraveermali22@gmail.com', '9799048973', '$2y$10$426ZOX9aZFRimK.xeIKXlu.FjL7ZTXWpUW.nWsfohI7ZKQcxJpIpi', 'hOGfOAh0ddN8PL2Xo2VGBIXU3djJJq3kp0vNdScxAGAkXQV2j1uEzKhwb7nS', NULL, NULL, '2018-11-03 02:20:58', '2018-11-03 02:21:44'],
		[65, 'mohit kuwal', 'mohitkuwal@gmail.com', '9461969303', '$2y$10$NkRw0zBKB/vnnj7RJG4a5e4GzT2C2NvAmPTrisoM8AUJkj3PVhhGC', 'f1TXAaX3VrMq8tixw96ZBMtuVGHmsbi744m6ryEFQQFiA1hCaVzoILX3R5Jz', NULL, NULL, '2018-11-03 04:56:47', '2018-11-03 04:57:03'],
		[66, 'sunil joshi', 'suniljoshibh@gmail.com', '6375579066', '$2y$10$lQqq6SwI0ht3o24UbKtoXeSNcNA2HdafwowfONRcyyH5AuZQoAxzG', 'NGe67OqScLmaPpYS3HfnqzaV7akxQJ24ydXSlfUvqylRjFcIjOoHyx7ce9tP', NULL, NULL, '2018-11-03 06:55:29', '2018-11-03 06:58:48'],
		[67, 'naresh sahu', 'nareshsahu1490@gmail.com', '7726020045', '$2y$10$WOROJKuCHR0nS3BaIA1pXepN.xTUyDLj3eaF8.9enB.8cSfHaCE5u', 'bAm5X1c8vXZ1cgJoDcJ0Kj4EJLmx4PDW8oVohe6kDS6wKwCqOpREEul0dAxo', NULL, NULL, '2018-11-08 09:28:31', '2018-11-08 09:28:55'],
		[68, 'Abbas Firoz', 'abbasfiroz50@gmail.com', '9892245097', '$2y$10$BojhU5B19LtyNBTPhexlKeyUIgXajAU5Levt6P9lP2QAafdgOSSqi', 'LGmsbOUNjn2fgGG1B4XBVsBjbdYb4ZRYBw1757cBqyYIY9Xj07K3PQtBSlx8', NULL, NULL, '2018-11-09 03:15:34', '2018-11-09 03:16:18'],
		[69, 'Raj', 'Mahboobahmedsheikh@gmail.com', '9799600998', '$2y$10$Im15STFdk/yYJIo9XEVbjOK0GoBADMT0ytHAU1g6P/PJDDBtj//j.', NULL, NULL, NULL, '2018-11-10 06:30:01', '2018-11-10 06:30:23'],
		[70, 'Nadeem Akhtar Qureshi', 'nadeem7479@yahoo.com', '9326613678', '$2y$10$CDyuoU0.0zo42JCwqXRSWeHI1arWsst62xNjPw7W5wVByhGlSEzqC', NULL, NULL, NULL, '2018-11-10 14:18:03', '2018-11-10 14:18:03'],
		[71, 'Kamal Kumar Jain', 'kamalkumarjain00@gmail.com', '9460803814', '$2y$10$0VwKa5vBkbFgibWlGoo4aO2TdVvN.iSebcOOF7HabOs.SJkRYCoZK', NULL, NULL, NULL, '2018-11-11 06:08:24', '2018-11-11 06:08:24'],
		[72, 'Kamal Galundia', 'ashagalundia@gmail.com', '9414808015', '$2y$10$LKptJQljJaIq5STXDedCfeORb8NGCklk.m0iioOvUNQxoLBPqvEnC', NULL, NULL, NULL, '2018-11-11 07:58:18', '2018-11-11 07:58:18'],
		[73, 'Dr Bhag Chand Sukhariya', 'bcsukhariya@gmail.com', '9982839503', '$2y$10$fDpHtJb9nKBVO3a1W5hbBef65SO6ncgAZoamfV6LjSgru21SVi3de', 'RyQmFFI49Omv5MiYkQKHdQH542aNT0yrrpprll1KLP8YL2x8K8nYoZ18koQJ', NULL, NULL, '2018-11-12 04:33:41', '2018-11-12 04:34:10'],
		[74, 'Shailesh Mehta', 'mehtasonly@gmail.com', '0000000000', '$2y$10$MU/UZOZKYZ78hqw4oCXvUeCDYzZl/EAZQRgZHpxJD92QMBpDHgZeu', 'R9c0PuKr0eKSc0gZDFftjAB3bHKx0NJdsZ9VLPYClJmA68qAvh3z1Tc7tRjJ', NULL, NULL, '2018-11-14 03:27:55', '2018-11-14 03:27:55'],
		[75, 'Abhishek soni', 'sonusoni717@gmail.com', '8225036046', '$2y$10$setXtZ8NE2rwWonwrcCaiut3f8Ubon1E8VZixaK9i92cJqZ6qjI7u', '4YWd7ikkDrJHxP102E2cHbaMGPJlcmVRj7toQNvlLqlMg6NTXVSIavdss3ym', NULL, NULL, '2018-11-15 03:17:15', '2018-11-15 03:17:55'],
		[76, 'paresh coelho', 'coelhoparesh@gmail.com', '9765891412', '$2y$10$HmMls9Z/.AKjGUA1tl49zuwZNdBcTX/Xv0875ae9gwnUKOol.5JI2', 'mMKmxkv33CPUVxOdAlHrjESVGiP7s4wQR0a35tZlMCZiauIpDZpNpyrRKMmL', NULL, NULL, '2018-11-15 20:59:00', '2018-11-15 21:01:01'],
		[77, 'Vickya Choubisa', 'vickychoubisa79@gmail.com', '8503846284', '$2y$10$f9gFLJE/WNCrmoXXBjqWZ.9tIFlDeNkNq6627NEiW1bZ0fKL.CHy2', 'UzwOGvWpZzupQNdPglDxNqmPHzQiJLb7qOm6SB0OeVGgYfXN8cu2NYWUBWkm', NULL, NULL, '2018-11-16 00:59:26', '2018-11-16 00:59:54'],
		[78, 'Girish', 'girishpaliwal.india@gmail.com', '9829854649', '$2y$10$1COy5YHdV/zX/tOzJrb5juek/iRellOQtoqPGlYpk691pAMeczLr6', 'BWdl3kREBWZYhdgNm5Av6W7cu9bd0nMH54IAPWIBRrdNZQeIaVmnVknZfyRB', NULL, NULL, '2018-11-18 15:22:12', '2018-11-18 15:22:12'],
		[79, 'Shubham Choubisa', 'shubhamchoubisa19@gmail.com', '7014513143', '$2y$10$NNPYVEpi/AxQMbjHyJj6TuzVK3dY29BqQHNmA6JQqbIf2sUjFMG8.', NULL, NULL, NULL, '2018-11-22 10:05:44', '2018-11-22 10:05:44'],
		[81, 'harshit kumawat', 'harshit93092@gmail.com', '7014319611', '$2y$10$RSG9N0ruVkuqPAX591Tcnujo2jwoWVCN0/iQNMukV/Rgv/mgp/eRe', 'SMZSubrCg96MpVrpwBeUODkz0yTWJ9xVytrWzgVS70a8HMnXVChfSG2bRXxH', NULL, NULL, '2018-11-24 03:06:13', '2018-11-24 03:11:48'],
		[82, 'Vinay', 'vinaykhabarani220@gmail.com', '8619851054', '$2y$10$FJ6h1ny2S33j4iHkAtkRw.LNIrlrKTrLLauAQBkyMYKfGjJueewcm', NULL, NULL, NULL, '2018-11-24 03:49:22', '2018-11-24 03:49:22'],
		[83, 'navneet agarwal', 'navneetjindal2012@gmail.com', '9660775154', '$2y$10$zKzzclhGp1pE2ryYWp892eyxC4U/STIlBFE32bTKLBA6MsaD761nO', 'YDLhMFrxOQUS9xRYzsw83tNA9yADELUxIHSgxtZVZBmpiz0syusMigCcfncf', NULL, NULL, '2018-11-24 05:40:30', '2018-11-24 05:41:14'],
		[84, 'Luv Sharma', 'engineerluv@gmail.com', '0000000000', '$2y$10$Qi5rUngMkdwhDBQd5xMtW.Y.0BjwToNgT8YnX/rpJxnpd1OXudeT2', 'WFSuZWMH5bHaCS46DWWuqwDlqqg3qwlBEiWTeVlIUGuPmtzBqzsmT4PpCepw', NULL, NULL, '2018-11-27 09:40:54', '2018-11-27 09:40:54'],
		[85, 'Mohammed irfan', 'irfan39.mi.mi@gmail.com', '9950503101', '$2y$10$O0BNdb3fn64e/tp0yu.SFOLqAFb9lhzRYfpZkVRTRMiT2J8.8leaK', '0oUPqJkv9HGlE4ojtFw5KkQbcwJYkgQaXpI61Au5qw5uuz76R6QG68ZgSfgf', NULL, NULL, '2018-11-27 10:09:05', '2018-11-27 10:09:53'],
		[86, 'Rajesh pahuja', 'Pahujarajesh33@yahoo.co.in', '9829897399', '$2y$10$VehdmKAf27iMLvJRYOZvs.amnUErpS9yZSkYnxvuCL5/gE1X1kTp2', NULL, NULL, NULL, '2018-11-28 00:47:15', '2018-11-28 00:47:15'],
		[87, 'Shweta tiwari', 'Goldensmile078@gmail.com', '8769408615', '$2y$10$7/l4hSz/EUaJoITI6.19huJibzPUcDuPoAaTbY/123VjZ3lYeE1X6', NULL, NULL, NULL, '2018-11-29 02:34:52', '2018-11-29 02:35:44'],
		[88, 'Bhavesh Doshi', 'nowdoshiis@gmail.com', '9799113327', '$2y$10$wDHSEpDx5PdSvia/JyI2zOjo48bveBVfA3/UQi6MeSbyQFe11dA2y', '8kFfrHE0xJlHPOFGH97mzVq8pNoeNJ3hz5fUQYQkYgcnSqNzykc3pA66lZDf', NULL, NULL, '2018-12-01 02:39:21', '2018-12-01 02:39:38'],
		[89, 'Ankit Talesara', 'talesara.ankit@gmail.com', '9829501401', '$2y$10$aPEPY5m5par8QZ6pj.21T.EsXdfMOOkSVuBcl6YqHHP0x2thcsRnK', NULL, NULL, NULL, '2018-12-01 06:19:27', '2018-12-01 06:19:27'],
		[90, 'bharti sisodia', 'bhartisisodia3@gmail.com', '8233457563', '$2y$10$tzbkXboYZeXHlje/ak5yWOACadPDYJtu5XPF6GglDdfC3DEHGycBu', 'cSyurUF7GwAUVN5OaqMqET5ugyf3HvmxUfZo6f78oCZlNShM7OL6LDOn4Ejt', NULL, NULL, '2018-12-03 10:29:05', '2018-12-03 10:30:54'],
		[91, 'yuvraj singh', 'Yuvraajsingh0403@gmail.com', '6375016407', '$2y$10$mur2Cu30fuPpahV0LWyusOjcyA0zZhxHDw/L07xSmnOBwSchrRaWe', NULL, NULL, NULL, '2018-12-05 23:41:14', '2018-12-05 23:41:14'],
		[92, 'KUSUM SALVI', 'Kusumsalvi10500@gmail.com', '7568356318', '$2y$10$NlcbcBvHfIcp2b8WGr1dkuUzzUSGV1irthkeZFlF8lGPNuxI0CRIO', NULL, NULL, NULL, '2018-12-08 10:23:29', '2018-12-08 10:23:29'],
		[93, 'gopal saini', 'gopalsaini495@gmail.com', '9928667403', '$2y$10$ZsJDWh3xuj5K97BdFgb/ye4eumXoEBw18LUl3Vov.gCawk712/bsy', NULL, NULL, NULL, '2018-12-12 04:49:33', '2018-12-12 04:49:33'],
		[94, 'Mukesh Soni', 'lifechange86@gmail.com', '0000000000', '$2y$10$HsfFB/REwoViEaR2dMKXreZy5RnVCz4S0l1sDPqAtsprtw1jR7n2q', 'zRTC8cxnxslWndpKpJIhs5qOc1O35YMtbFeXFXwqQiVIwmcpMPG6JUekbeaS', NULL, NULL, '2018-12-12 06:13:14', '2018-12-12 06:13:14'],
		[95, 'Lavina', 'Lavinasamar@gmail.com', '9414470799', '$2y$10$dMRlOcSJMA2JwzjLnXAUeukFHM8NbTWdc.9pX6ZlqIfR3prePS4sy', NULL, NULL, NULL, '2018-12-16 12:34:43', '2018-12-16 12:34:43'],
		[96, 'Prashant Awasthi', 'awasthipk@gmail.com', '9310566487', '$2y$10$irHHxXS17FfoEi4Wr98NPOQI0I4QtkRGO4Req/59u7fqfF1ylC3BO', NULL, NULL, NULL, '2018-12-20 03:36:10', '2018-12-20 03:36:10'],
		[97, 'Amit Chobisa', 'chobisaamit@gmail.com', '9414386223', '$2y$10$879JBJdtQJotEsWkXQNcJeipfWzr.BML7T53wg8rq5Tmg/j.YP31C', NULL, NULL, NULL, '2018-12-20 10:39:15', '2018-12-20 10:39:15'],
		[98, 'Girish Sharma', 'girishudr@gmail.com', '9352517474', '$2y$10$YnfrMnqHvbPv/CdtQFr6X.GB11d8W.mbcyteWcI7rgGuv.nauPyyq', 'D8VOOHQNvJZddL121P8SQhcv5lo6trwEOqJb9INqXYckRv0ofbA8O3NjRdvA', NULL, NULL, '2018-12-21 06:31:14', '2018-12-21 06:31:36'],
		[99, 'vinay jain', 'vinayj2425@gmail.com', '8769196712', '$2y$10$fMabMmwet5565SFu6AdqguYbsxCAO4HKARRh69UmFVIVvNiqXSTF2', 'mg00dkmbzVysJWOiyjRZZB3GG2DVQOzifbUha9OA42nAmWH1wl5vnpBbSzb3', NULL, NULL, '2018-12-21 08:24:55', '2018-12-21 08:25:41'],
		[100, 'Rishit', 'Rishit@Test.com', '9636805239', '$2y$10$wQO/kiN7pstjxrRxJYfNFeB.Gfz5E3u39jNynvy1AsqYfwV0Y8TGG', NULL, NULL, NULL, '2018-12-21 08:50:17', '2018-12-21 08:50:17'],
		[101, 'Dileep Jain', 'jaindileep0212@gmail.com', '9461174476', '$2y$10$ugnPxSlSRQmHLVA4hp7pFOz0D5X4XmfKGxhbV/lpbez.oeTGM4i46', NULL, NULL, NULL, '2018-12-21 10:21:38', '2018-12-21 10:21:38'],
		[102, 'TARANG Khathar', 'tarangkhathar22@gmail.com', '7073599911', '$2y$10$q3F2oJ9EJ2v8G0b7Qro6OOh0J8sgGAjpc8s3TqHGYLsHAeG.VDfw6', 'srb4tbwoeOpXc9k02PWnnVRDGkp9po8vzAwJaR2gkuS2C1l2w5KIY5DIpyck', NULL, NULL, '2018-12-22 04:54:45', '2018-12-22 04:54:54'],
		[103, 'Dharmendra Mandot', 'nakodapaints.udr@gmail.com', '9828140456', '$2y$10$QGIfNlBHFP1gWjjszX0MCOhNtDnwu5.Ln.5WQyc.7t7d5jAd0bJ/G', NULL, NULL, NULL, '2018-12-22 07:49:49', '2018-12-22 07:49:49'],
		[104, 'Prafull Paneri', 'justprafull@gmail.com', '9414291561', '$2y$10$YukYWt2fpH2JDQo2PpF1yObhCe4CIqW6xcmXBZxrefbug7eMwJ5va', NULL, NULL, NULL, '2018-12-24 01:45:35', '2018-12-24 01:45:35'],
		[105, 'Prince bhavdev singh', 'Princecharlie2016@gmail.com', '9950140143', '$2y$10$PVJoBeOmqbn0NOESkobGpeHE7tBq3tcnOr.kQ7QQSg.4MhOdYNI66', NULL, NULL, NULL, '2018-12-24 02:10:37', '2018-12-24 02:10:37'],
		[106, 'Vivek Bhadviya', 'bhadviya@rediffmail.com', '9413474187', '$2y$10$/3Awt4/Sgcc0XPNUAA4YF.GqerU/EcQ/AFNv0uRpaRKcm6HJ9CGVO', NULL, NULL, NULL, '2018-12-27 03:21:36', '2018-12-27 03:21:36'],
		[107, 'Vikash Panjetha', 'vikashpanjetha@gmail.com', '0000000000', '$2y$10$UUrulkYnpYKMPT/KYBaPVuMwA9bGPSMZsxfLgygi1EqPWRedPkQWi', 'KwCioflXMQYIMgVxGLnXzokfVPQXTNFKIG3GYC5JDt2Y2wmL8kPMvRXzbsNi', NULL, NULL, '2018-12-27 03:23:31', '2018-12-27 03:23:31'],
		[108,'Sardar Singh Sisodiya','mlsu.online.window@gmail.com','7426887925','$2y$10$RfwDGwsZCl3838IRN1ITteWZS.w2ONSD56abgfzMGNoRUpQQMob5.','Njj7as1J3wMEEaCbDLW8zfwr2CSUL3FFP6yMYjVNj2xR0gaPOcZ7hXUAjQQ5',NULL,NULL,'2018-12-29 13:33:08','2018-12-29 13:33:49'],
		[109,'siya kalra','siyakalra85@gmail.com','8003702042','$2y$10$HmagDq.Z3bmmTnMNSGdjeu1aRdlZYhR9mQxhbzh0C1maVEzbUR7o.','j78BSzMoXS5wuwNg3PHXJJ3WrZDcURJ1xHTndsiegXHrQts2i2w6uStDx8oY',NULL,NULL,'2018-12-29 16:52:21','2018-12-29 16:53:36'],
		[110,'XYZ','XYZ@GMAIL.COM','9000000000','$2y$10$8YDHX7CggwAk3menfRAJlO4mCG7IOkltfFYuukeiXGSGtat7ANT2i',NULL,NULL,NULL,'2018-12-30 11:11:47','2018-12-30 11:11:47'],
		[111,'Abhi Soni','abhisoniyo008@gmail.com','8005615767','$2y$10$5H8pzv/AoaURvG6NJY.FIOj4AmmVqmxmNrjR8VwNv7vlOS6ZJcMRe','iYUKGZFYVzhBWMvjyJ0XazD7HvAMTeekIwb4SfrnqHPfUcUb5bXSPlowAsLn',NULL,NULL,'2018-12-31 08:41:56','2018-12-31 08:42:26'],
		[112,'Madan salvi','Salvimadan24@gmail.com','8290280799','$2y$10$ivr.JBz7G0Ov/2VIvPd0kei5Dj4UBIqEyCX7.IE.hRbsTYNuTjg4S',NULL,NULL,NULL,'2019-01-02 02:54:52','2019-01-02 02:54:52'],
		[113,'Kumar','kkumar@sanjeevnigroup.com','8875111105','$2y$10$wuta.YoWeDU9cnAdtmH4B./4fDZF6AOM6FLEQaet7xUjW2nu9B8hi',NULL,NULL,NULL,'2019-01-02 11:50:55','2019-01-02 11:51:18'],
		[114,'Ravindra singh Jhala','278227@gmail.com','9636740378','$2y$10$dHQwyo34Q.wI75zGRCePB.WHEoG/OInAnG2JWOPUVstCIC8Y7Fk6S','4GSWSCNPxCkv3hbG00ukr9RbMD3neZl4VLL6XpIY0AuPAbYjdtJ8tXCCJlfR',NULL,NULL,'2019-01-04 06:48:24','2019-01-04 06:49:31'],
		[115,'Ronak bhadviya','Ronakbhadviya@gmail.com','9828012229','$2y$10$NvkEFN7KEcO4RcVcIb/84.X.zxv3ewGL6IQlCLzot.UwVV6n4Lzgu',NULL,NULL,NULL,'2019-01-04 08:23:40','2019-01-04 08:23:40'],
		[116,'Aazam','aameer14121998@gmail.com','8619684523','$2y$10$sK7e3LHRrMXibxHlatJ3Cepc4eQGBImMasbeCNvGkY8p6SSv2UXrG','tLIB2PkhDCG3e2BD7JG0XJS2EnaPZZGzou8mhTk7toHU3ChjuNiEMs3x7RtU',NULL,NULL,'2019-01-07 08:10:19','2019-01-07 08:17:53'],
		[117,'Anuj Sharma','anuj957139@gmail.com','8619586831','$2y$10$nwg6fcL0tg452Q5QM4Jw3.reyWe.WtFrkar3zuy74iKXW5qKM3Fvy',NULL,NULL,NULL,'2019-01-08 17:14:59','2019-01-08 17:14:59'],
		[118,'DJ DEVELOPER','djdeveloper007@gmail.com','7096381910','$2y$10$Gv3jjtOQNJqroOoK1RArpOyaEDcEwOM3WX9hwC0kjpXBpvillKslq','i69kQjdAxCD3cwwWJK9NBt6oUBxWrYRwvWOfnX41ylZKDj4VeT0WDKPeBJa5',NULL,NULL,'2019-01-09 14:13:55','2019-01-09 14:14:05'],
		[119,'Anjali Patel','anjalipatel1094@gmail.com','9979923781','$2y$10$InHTsmSgLReJ.av903uPneTokFBmqpUbdore0Xu15QCXGhorfDSee','SFdQBomQ80QWxJYf48gj7aqtm68oF9Vamnk9tWEoXDjQccaM1wCj2cPmzG6t',NULL,NULL,'2019-01-09 14:38:25','2019-01-09 14:38:51'],
		[120,'AAY','aay@gmail.com','9602403212','$2y$10$mpEMDP1Jx/wiHZf76mUUBefQs0r7Mocm4yK8n2ybCi4MZLW6HSjRG',NULL,NULL,NULL,'2019-01-18 06:23:57','2019-01-18 06:23:57'],
		[121,'gurjit singh','gsbahlan@gmail.com','7568000222','$2y$10$jSwuEf1g1A7AKVqfjl3pGOBPK5kgHYR2mAvB7HvkaKoKXH.Vhf2Qe',NULL,NULL,NULL,'2019-01-23 06:35:58','2019-01-23 06:36:24'],
		[122,'Aman Avi','aman.avi40@gmail.com','8107227773','$2y$10$2RF/tSDelU7RphGw/6ReKu8MVFNy1nLY0ZGtkF58P7arnNk8CFIjK','QPtNEWmGMR9rEOAdumnXpIWp64aO2LHgeQsDvOpL0REyfttLIRo3A12kMMuS',NULL,NULL,'2019-01-27 05:56:50','2019-01-27 05:57:11'],
		[123,'Aarini Holidays','a.dwivedi@hotmail.com','7226084443','$2y$10$Pf07GFCSmJPJFFMBtlxHeeyeLuMPTTN33ltEZt0AcQ357e4p0AJcW','CRjmiiX75pWx2g3t6Qi3BFB3mFIFGatVKBVMyb9cbsksxXszBw9okFfW7TC2',NULL,NULL,'2019-02-01 08:40:01','2019-02-01 08:40:40'],
		[124,'anita singh','anitasingh045@gmail.com','7665111660','$2y$10$fCiG/a5PacTsrqJvQPoEJ.J5ipZS1cZpAQzcHXQok1RYdJH3kUnWC',NULL,NULL,NULL,'2019-02-01 15:57:42','2019-02-01 15:57:42'],
		[125,'Satyanarayan Paliwal','satyanarayanpaliwal@gmail.com','9057521037','$2y$10$Ri48/M0zdnyO7ZRpO4gSl.onfnHs/MxpcxwynkedbvyDJQvPM/FMq','wgyUy2G1qjR9hlhq6ehAVs409CKnfHcJt6L0x2zIgmdvx82oIbKX6scDYtPL',NULL,NULL,'2019-02-05 13:34:06','2019-02-05 13:34:24'],
		[126,'sangram keshari panda','sangramcipet@gmail.com','9636691826','$2y$10$QVZ621BB8wLVGqgwXgXqjuZal6P2smCCNgc.D8IZmaEorWhTISQUy','J1DxRJYzLrH1A5cPON1OV46rt3w3MMsibsy6YN25FZ736i1FfCYfn72E5FQl',NULL,NULL,'2019-02-05 17:37:43','2019-02-05 17:38:02'],
		[127,'Yogesh jangid','bhatiyani2016@gmail.com','9664460944','$2y$10$wYRJiXsR9w5dvMYuXbhIuefo.Wvmc8/4m5B38da8AM7Q3Ydo/H67G',NULL,NULL,NULL,'2019-02-05 17:58:09','2019-02-05 17:58:09'],
		[128,'Rakesh sinha','rksinha.btech@gmail.com','8559846603','$2y$10$H78CYE652CyHUCAnFyVT7.cnzjkai/D2OU2.6MqZ7NlemFxrzEwRi','uKHPGSVuocRWt6TZL2iB99vuukC1w9DpoTShl7N3drfBg4OCUFU4fELQHSWi',NULL,NULL,'2019-02-07 07:33:12','2019-02-21 08:08:32'],
		[129,'Mohit','mohit.sharma378@gmail.com','8003112727','$2y$10$BAIol9mfPBJFr/AuR8QGx.0j.ad2s8fBne4b4WmQCb8nC83.19w/O',NULL,NULL,NULL,'2019-02-11 14:35:53','2019-02-11 14:35:53'],
		[130,'SUNIL CHITTORA','sunilchittora12@gmail.com','0000000000','$2y$10$38TSS5X6SfVhB9G.6wPzWeFbaMmmXoovXA9fXhlIA/Xs47xwAn6M2','jdxUNdDoBDaXMigx3H0vSMJbjt3hbCms3cOfBsSENUOgIapibjxPLyptrROl',NULL,NULL,'2019-02-15 17:11:02','2019-02-15 17:11:02'],
		[131,'Ankit Mandot','ankitmandot86@gmail.com','0000000000','$2y$10$Y3zYz8XrMnjKYpy05vZVh.BUSIuWhSW8rehoc1SOTiWLiq.QIXa7S','wk8J6xpVENVsSqFW1c9GEDvd27dRM3FYuFJ6dGC5rMJvYN1oE1t3QQp6DeMt',NULL,NULL,'2019-02-17 17:31:53','2019-02-17 17:31:53'],
		[132,'Sarvjeet Kothari','sarvjeetkothari66@gmail.com','9928006642','$2y$10$M5Fsto0p2VXaHycvo57Nr.O3eGHgpG7qk8bQIn93y3FJkHgYOMrfq','KYlgwckJylGPMBmjVHW7UCK8BcnRfG5ldUtnCeKQrvRupbGHdY1ZTSEQCHVj',NULL,NULL,'2019-02-23 09:12:59','2019-02-23 09:13:12'],
		[133,'nikunj kalal','nikunj.kalal98@gmail.com','9950402128','$2y$10$2/.PW.AD0sHC86uxVg8NMOe8w61NwrL7h8uwakjpEA03n8ursNrle','s4dDt0V2F4OmaqpZEOexn7A80oCJRAmY71I3Tbe1ZGFfdVug9DFFO3s62RGj',NULL,NULL,'2019-02-24 04:25:07','2019-02-24 04:25:54'],
		[134,'Manoj Sahu','manojsahuonline@yahoo.co.in','8386063464','$2y$10$kOp9zNE3hcfuoCy9AYYpSuxDoyKshWmOmc3AjS1nviKPwLtaEdNPa',NULL,NULL,NULL,'2019-02-26 03:56:27','2019-02-26 03:56:27'],
		[135,'Abhishek chouhan','abhishekkchouhan12@gmail.com','8386860867','$2y$10$lWhrDg0wT8Llzz9nIaxxCeBTwShTJ/a5AucudpckxZUNTJ3qs4.0q','vNAuPSc4ujhggbjJaJoa13cYWcHVPpOtE7kpty0rEuHb0dCxBR8RUnl9oOWt',NULL,NULL,'2019-02-27 10:07:56','2019-02-27 10:08:37'],
		[136,'Sonia rajpal','Vinisharajpal1991@gmail.com','9660013346','$2y$10$VRX/4MQld0MngxpmZZRN5OwuhPJ.nZCoDwjZ5pM2KfKBAj3C/Z9jG',NULL,NULL,NULL,'2019-02-27 10:59:07','2019-02-27 10:59:07'],
		[137,'Rahul Bangar','rahulbangar00@gmail.com','7073254448','$2y$10$.RjPeXaZGeVW1AN.8LJ43.njuCdfaO6Y/kQ78oN.WwBKEsys7DF7a','Q7tyTC5ZLfXCiDaXNJIRetqIc2hiZe1Qpw0I8RVg8je4bjWr2lcKoFfKd3aR',NULL,NULL,'2019-02-28 09:08:06','2019-02-28 09:09:01'],
		[138,'arjun Patel','arjunpatelkharbadiya@gmail.com','9587150999','$2y$10$.m0HHjYPwxEexvF6uWWaP.lIO/0COXVrx9aoc7bGD5.gwA3XeWkRO',NULL,NULL,NULL,'2019-03-03 10:33:02','2019-03-03 10:33:02'],
		[139,'Kamal Hinged','hr.kamalhinged@gmail.com','7073145662','$2y$10$6Nnsp3PpR/mXB2aHILT5BuOqssciFrl0vxNY080W7oMtb1oPzjK5.',NULL,NULL,NULL,'2019-03-04 08:38:57','2019-03-04 08:38:57'],
		[140,'dhawal jain','dhawal72925@gmail.com','0000000000','$2y$10$WI0T3whe.kRsRTUcNZnrWuO7SuUOsRTRbrpwDfpKuEwgxCqDlLtRW','bTZArywYqjewU2U2PWqlZrt3DQuwNSw21ijIcAcwx3d7VYZrKQmPnqIc2SkT',NULL,NULL,'2019-03-05 14:06:48','2019-03-05 14:06:48'],
		[141,'Rajesh Parihar','rajeshsinghparihar78@gmail.com','0000000000','$2y$10$3Yl97gh6evUovhIYJBri7Ohm4krYy1aZ8XXP1ED39albv23lgsDZu','CAKsKasdZ5wqAC6CUmUXjZKNgFXEHLADHpi99VUWq6sTu9YBHHHXzv4gZlF1',NULL,NULL,'2019-03-06 14:27:08','2019-03-06 14:27:08'],
		[142,'Prekshit jain','prekshitjain164@gmail.com','7597910776','$2y$10$02NSSCDRxSTwTAe4J3HPJ.WTcKqF8iCavEy.YEsxEj7nNwhFo17nq',NULL,NULL,NULL,'2019-03-06 18:29:12','2019-03-06 18:29:12'],
		[143,'Moni jain','moni631996@gmail.com','8830106404','$2y$10$8eLur5bemji2/tmmwhz4cuJTDT7E7Z5zLoyyWdoaIY6Si0EUmy6C6','yCcjuzYWoq2cLirA926Tz1CREBiD7lK9eJFIs3tpTs8PfvskagFtBOkUP7dV',NULL,NULL,'2019-03-09 06:36:39','2019-03-09 06:36:56'],
		[144,'Dr.Ram Meena','dr.rahi1986@gmail.com','9214035783','$2y$10$8iC6j11F5OQHHCo8u.4W9OUwLujFe/tO5pVSILDmYd.P.O8b0fjyq',NULL,NULL,NULL,'2019-03-10 17:19:06','2019-03-10 17:21:37'],
		[145,'Panil Pokharna','panilpokh@gmail.com','9772267444','$2y$10$mwR35OjUMce0gnM3VLhK/uTJ2HN6LBHS57q8/k8DWWAUkIHueP6em','DaGR2fA2yqfIbuy61XvXD4tRYCRZKDLYPPBd5NifJEDzb0KwsnVgjlDra3xk',NULL,NULL,'2019-03-25 06:59:52','2019-03-25 07:00:05'],
		[146,'Vikas Parmar','vikasparmar893@gmail.com','8003137776','$2y$10$KOvvXTjK9gia4FWU3XwWEe1.rIJGUL3XQB/drx1F.V8U8dnBnodPm','UnmmCrQ3rQwpizHhXAWfVOp1uDjNOxHSK8JmJrQodkLXqZJ6fz9stbfpAEcO',NULL,NULL,'2019-03-25 07:12:12','2019-03-25 07:14:12']
	];

		$user_field = ['id', 'name', 'email', 'mobile', 'password', 'remember_token', 'provider', 'provider_id', 'created_at', 'updated_at'];
		
		$new_user_data = [];

		foreach ($user_data as $key => $value) {
			try{
				$user_model = $this->add('xepan\base\Model_User');
				$user_model->addCondition('username',$value[2]);
				$user_model->addCondition('status',"Active");
				$user_model->addCondition('scope',"WebsiteUser");
				$user_model->tryLoadAny();
				$user_model->save();

				$contact = $this->add('xepan\base\Model_Contact');
				$contact->addCondition('first_name',$value[1]);
				$contact->addCondition('user_id',$user_model->id);
				$contact->tryLoadAny();

				$contact['last_name'] = " ";
				$contact['created_at'] = $value[8];
				$contact['updated_at'] = $value[9];
				$contact->save();

				$contact->addEmail($value[2]);
				$contact->addPhone($value[3]);

			}catch(\Exception $e){

			}
			$new_user_data[$value[0]] = $contact->id;
		}

		$f_array = $this->getFeatures();
		$property_field = [
							'id',  //0
							'user_id', //1
							'title', //2
							'status',  //3
							'type',  //4
							'price',  //5
							'area',  //6
							'area_type', //7 
							'rooms', //8
							'images', //9
							'address', //10
							'city',  //11
							'state',  //12
							'zipcode', //13
							'description', //14
							'detailed_info', //15
							'created_at', //16
							'updated_at', //17
							'deleted_at' //18
					];
		
		$count = 1;
		foreach ($property_data as $key => $value) {

			try{

				$data = $value[9];
				$data = trim($data,"'[");
				$data = trim($data,"]'");

				$data = explode(",", $data);
				$base_path = '/var/www/html/udrreal/storage/app/public/properties/';

				$img_url_id = [];
				foreach ($data as $key => $url){
					if(!$url) continue;
					$url = str_replace('/storage/properties/', "", $url);
					$url = str_replace('"', "", $url);
					$file_name = $url = trim($url);

					$url  = $base_path.$url;
					
					if(!file_exists($url)){
						echo "not found ".$url."<br/>";
						continue;
					}
					
					// echo $count." ".$file_name."<br/>";
					// $count ++;

					$img_model = $this->add('xepan\filestore\Model_Image');
					$img_model->import($url,'copy');
					$img_model['original_filename'] = $file_name;
					$img_model->save();

					$img_url_id[] = $img_model->id;
				}

				$m = $this->add('xepan\listing\Model_ListData',['listing'=>1]);
				$m['status'] = "Approved";
				$m['created_by_id'] = $new_user_data[$value[1]];
				$m['created_at'] = $value[16];
				$m['updated_at'] = $value[17];
				
				$m['title'] = $value[2];
				if($value[3] == "sell")
					$ps = "For Sell";
				elseif($value[3] == "rent")
					$ps = "For Rent";

				$m['property_status'] = $ps;
				$m['property_type'] = ucfirst($value[4]);
				$m['price'] = $value[5];
				$m['area'] = $value[6]." ".$value[7];
				$m['bhk'] = $value[8]?:0;
				$m['address'] = $value[10];
				$m['city'] = $value[11];
				$m['state'] = $value[12];
				$m['zip_code'] = $value[13];
				$m['description'] = $value[14];

				$extra_data = json_decode($value[15],true);
				$m['converted'] = isset($extra_data['converted'])?$extra_data['converted']:"";
				$m['building_age'] = isset($extra_data['building_age'])?$extra_data['building_age']:"";
				$m['bedrooms'] = isset($extra_data['bedrooms'])?$extra_data['bedrooms']:"";
				$m['bathrooms'] = isset($extra_data['bathrooms'])?$extra_data['bathrooms']:"";
				
				$m['air_conditioning'] = $f_array[$value[0]]['air_conditioning'];
				$m['swimming_pool'] = $f_array[$value[0]]['swimming_pool'];
				$m['garden'] = $f_array[$value[0]]['garden'];
				$m['parking'] = $f_array[$value[0]]['parking'];
				$m['furnished'] = $f_array[$value[0]]['furnished'];

				if(isset($img_url_id[0])) $m['profile_image_id'] = $img_url_id[0];
				if(isset($img_url_id[1])) $m['slider_image_1_id'] = $img_url_id[1];
				if(isset($img_url_id[2])) $m['slider_image_2_id'] = $img_url_id[2];
				if(isset($img_url_id[3])) $m['slider_image_3_id'] = $img_url_id[3];
				if(isset($img_url_id[4])) $m['slider_image_4_id'] = $img_url_id[4];
				if(isset($img_url_id[5])) $m['slider_image_5_id'] = $img_url_id[5];
				if(isset($img_url_id[6])) $m['slider_image_6_id'] = $img_url_id[6];
				if(isset($img_url_id[7])) $m['slider_image_7_id'] = $img_url_id[7];
				if(isset($img_url_id[8])) $m['slider_image_8_id'] = $img_url_id[8];
				if(isset($img_url_id[9])) $m['slider_image_9_id'] = $img_url_id[9];
				if(isset($img_url_id[10])) $m['slider_image_10_id'] = $img_url_id[10];
				if(isset($img_url_id[11])) $m['slider_image_11_id'] = $img_url_id[11];
				if(isset($img_url_id[12])) $m['slider_image_12_id'] = $img_url_id[12];

				$m->save();

				$buy_id = 1;
				$rent_id = 2;
				$sell_id = 3;
				$all_id = 4;
				$cat_ids = [4];

				if($value[3] == "sell"){
					$parent_id = $cat_ids[] = 3;
				}elseif($value[3] == "rent"){
					$parent_id = $cat_ids[] = 2;
				}
				
				// if($parent_id){
				// 	$cat_ids[] = $this->add('xepan\listing\Model_Category')->addCondition('parent_id',$parent_id)->addCondition('name',ucfirst($value[4]))->tryLoadAny()->get('id');
				// }

				foreach ($cat_ids as $key => $cid) {
					$asso = $this->add('xepan\listing\Model_Association_ListDataCategory');
					$asso['list_id'] = 1;
					$asso['list_category_id'] = $cid;
					$asso['list_data_id'] = $m->id;
					$asso->save();
				}


			}catch(\Exception $e){
				echo $e;
			}

		}
	}

	function getFeatures(){
		$data = [
				'air_conditioning' => 0,
				'swimming_pool' => 0,
				'garden' => 0,
				'parking' => 0,
				'furnished' => 0
			];
		$return = [];
		foreach ($this->pro_fea_asso_data as $key => $value) {
			if(!isset($return[$value[0]])) $return[$value[0]] = $data;

			$p_id = $value[0];

			switch ($value[1]) {
				case 1:
					$return[$p_id]['air_conditioning'] = 1;
				break;
				case 2:
					$return[$p_id]['swimming_pool'] = 1;
				break;
				case 3:
					$return[$p_id]['garden'] = 1;
				break;
				case 4:
					$return[$p_id]['parking'] = 1;
				break;
				case 5:
					$return[$p_id]['furnished'] = 1;
				break;
			}
		}

		return $return;
	}
}

