import 'dart:async';

import 'package:flutter/material.dart';
import 'package:flutter_image_slideshow/flutter_image_slideshow.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';
import 'package:kf_drawer/kf_drawer.dart';
import 'package:mui_bekasi/api/config.dart';
import 'package:mui_bekasi/util/convert_colors.dart';
import 'package:mui_bekasi/util/preferences.dart';
import 'package:shimmer/shimmer.dart';
import 'package:webview_flutter_plus/webview_flutter_plus.dart';

class MyLocation extends KFDrawerContent {
  MyLocation({Key key});

  @override
  _MainPageState createState() => _MainPageState();
}

class _MainPageState extends State<MyLocation> {
  WebViewPlusController _myController;
  UniqueKey _key = UniqueKey();
  bool cekLoading = true;
  Completer<GoogleMapController> _controller = Completer();
  double longitude;
  double latitude;
  CameraPosition _kGooglePlex;

  @override
  void initState() {
    super.initState();
    service();
  }

  void service() async{
    Config.log('LONG : '+(await Prefs.getLONG).toString());
    Config.log('LAT : '+(await Prefs.getLAT).toString());
    longitude = double.parse((await Prefs.getLONG) != null && (await Prefs.getLONG).isNotEmpty ? await Prefs.getLONG:'113.86021588190619');
    latitude = double.parse((await Prefs.getLAT) != null && (await Prefs.getLAT).isNotEmpty ? await Prefs.getLAT:'113.86021588190619');
    _kGooglePlex = CameraPosition(
      target: LatLng(latitude, longitude),
      zoom: 15,
    );
    setState(() {});
  }

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Stack(
        children: <Widget>[
          _kGooglePlex != null ?GoogleMap(
            mapType: MapType.normal,
            initialCameraPosition: _kGooglePlex,
            onMapCreated: (GoogleMapController controller) {
              _controller.complete(controller);
            },
            onTap: (latlang){

            },
          ):_loadingView(),
          Container(
            color: HexColor('#2f744d').withGreen(200),
            padding: EdgeInsets.only(top: 5, bottom: 5, left: 5),
            child: Row(
              children: <Widget>[
                ClipRRect(
                  borderRadius: BorderRadius.all(Radius.circular(32.0)),
                  child: Material(
                    shadowColor: Colors.transparent,
                    color: Colors.transparent,
                    child: IconButton(
                      icon: Icon(
                        Icons.menu,
                        color: Colors.white,
                      ),
                      onPressed: widget.onMenuPressed,
                    ),
                  ),
                ),
                Text("Maps", style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold, color: Colors.white), textAlign: TextAlign.center,),
                Spacer(),
                InkWell(
                  child: Container(
                    height: 40,
                    width: 40,
                    decoration: BoxDecoration(
                        borderRadius: BorderRadius.circular(20),
                        image: DecorationImage(
                            image: AssetImage('images/ic_logo.jpg'),
                            fit: BoxFit.cover)),
                  ),
                ),
                SizedBox(width: 15)
              ],
            ),
          ),
        ],
      ),
    );
  }

  _loadingView() {
    return Padding(
      padding: const EdgeInsets.all(20.0),
      child: Column(
          children: List.generate(
              3,
                  (index) => Column(
                children: [
                  shimmerView(Container(
                      width: double.infinity,
                      height: 80,
                      decoration: BoxDecoration(
                          color: Colors.white54,
                          borderRadius: BorderRadius.circular(10.0)))),
                  VerticalSpacing()
                ],
              ))),
    );
  }

  Widget shimmerView(Widget widget) {
    return Shimmer.fromColors(
        baseColor: Colors.red[100],
        highlightColor: Colors.grey[300],
        child: widget);
  }
}

class VerticalSpacing extends SizedBox {
  VerticalSpacing({double height = 16.0}) : super(height: height);
}