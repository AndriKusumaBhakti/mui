import 'dart:convert';
import 'dart:ffi';

import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:kf_drawer/kf_drawer.dart';
import 'package:mui_bekasi/api/call_service.dart';
import 'package:mui_bekasi/class_builder.dart';
import 'package:mui_bekasi/api/config.dart';
import 'package:mui_bekasi/home.dart';
import 'package:mui_bekasi/my_location.dart';
import 'package:mui_bekasi/privasi_police.dart';
import 'package:mui_bekasi/util/convert_colors.dart';
import 'package:mui_bekasi/util/preferences.dart';
import 'package:mui_bekasi/web_url_facebook.dart';
import 'package:mui_bekasi/web_url_instagram.dart';
import 'package:mui_bekasi/web_url_site.dart';
import 'package:mui_bekasi/web_url_twitter.dart';
import 'package:mui_bekasi/web_url_youtobe.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:splash_screen_view/SplashScreenView.dart';

const Color p = Colors.green;

void main() {
  WidgetsFlutterBinding.ensureInitialized();
  ClassBuilder.registerClasses();
  var api = new Config(child: new MyApp());
  api.isDebug(true);
  runApp(api);
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      theme: ThemeData(
        primarySwatch: Colors.green,
        primaryColor: p,
      ),
      debugShowCheckedModeBanner: false,
      home: SplashScreenPage(),
    );
  }
}

class SplashScreenPage extends StatefulWidget {
  const SplashScreenPage({Key key}) : super(key: key);

  @override
  State<SplashScreenPage> createState() => _SplashScreenPageState();
}

class _SplashScreenPageState extends State<SplashScreenPage> {

  @override
  void initState() {
    super.initState();
    service();
  }

  void service(){
    getService(context, '/method.php?method=mediaSosial').then((value) async{
      Map<String, dynamic> resp = Map<String, dynamic>.from(json.decode(value));
      if(resp['status'] && resp['result'] != null && resp['result'].length >0){
        List<dynamic> result = List<dynamic>.from(resp['result']);
        await Prefs.setLAT(result.where((element) => element['tipe'].toString().toLowerCase() == 'latitude').toList().length>0?
        result.where((element) => element['tipe'].toString().toLowerCase() == 'latitude').toList()[0]['kode']:'-7.008061745710969');

        await Prefs.setLONG(result.where((element) => element['tipe'].toString().toLowerCase() == 'longitude').toList().length>0?
        result.where((element) => element['tipe'].toString().toLowerCase() == 'longitude').toList()[0]['kode']:'113.86021588190619');

        await Prefs.setFB(result.where((element) => element['tipe'].toString().toLowerCase() == 'facebook').toList().length>0?
            result.where((element) => element['tipe'].toString().toLowerCase() == 'facebook').toList()[0]['kode']:'https://web.facebook.com/profile.php?id=100078059220710');

        await Prefs.setITG(result.where((element) => element['tipe'].toString().toLowerCase() == 'instagram').toList().length>0?
        result.where((element) => element['tipe'].toString().toLowerCase() == 'instagram').toList()[0]['kode']:'https://www.instagram.com/muitvkotabekasi');

        await Prefs.setPRIVACY(result.where((element) => element['tipe'].toString().toLowerCase() == 'privacy police').toList().length>0?
        result.where((element) => element['tipe'].toString().toLowerCase() == 'privacy police').toList()[0]['kode']:'https://muitvkotabekasi.com/privacypolicy.html');

        await Prefs.setTWT(result.where((element) => element['tipe'].toString().toLowerCase() == 'twitter').toList().length>0?
        result.where((element) => element['tipe'].toString().toLowerCase() == 'twitter').toList()[0]['kode']:'https://twitter.com/MUITVKOTABEKASI?t=aAcRhKozHc3RJOF6XeHYqA');

        await Prefs.setYTB(result.where((element) => element['tipe'].toString().toLowerCase() == 'youtube').toList().length>0?
        result.where((element) => element['tipe'].toString().toLowerCase() == 'youtube').toList()[0]['kode']:'https://www.youtube.com/channel/UChi93oPQliOm8Z6ACYq5fxA');

        await Prefs.setWBS(result.where((element) => element['tipe'].toString().toLowerCase() == 'website').toList().length>0?
        result.where((element) => element['tipe'].toString().toLowerCase() == 'website').toList()[0]['kode']:'https://muitvkotabekasi.com');
      }else{
        await Prefs.setFB('https://web.facebook.com/profile.php?id=100078059220710');
        await Prefs.setITG('https://www.instagram.com/muitvkotabekasi');
        await Prefs.setLAT('-7.008061745710969');
        await Prefs.setLONG('113.86021588190619');
        await Prefs.setPRIVACY('https://muitvkotabekasi.com/privacypolicy.html');
        await Prefs.setTWT('https://twitter.com/MUITVKOTABEKASI?t=aAcRhKozHc3RJOF6XeHYqA');
        await Prefs.setYTB('https://www.youtube.com/channel/UChi93oPQliOm8Z6ACYq5fxA');
        await Prefs.setWBS('https://muitvkotabekasi.com');
      }
    }).catchError((error)async{
      await Prefs.setFB('https://web.facebook.com/profile.php?id=100078059220710');
      await Prefs.setITG('https://www.instagram.com/muitvkotabekasi');
      await Prefs.setLAT('-7.008061745710969');
      await Prefs.setLONG('113.86021588190619');
      await Prefs.setPRIVACY('https://muitvkotabekasi.com/privacypolicy.html');
      await Prefs.setTWT('https://twitter.com/MUITVKOTABEKASI?t=aAcRhKozHc3RJOF6XeHYqA');
      await Prefs.setYTB('https://www.youtube.com/channel/UChi93oPQliOm8Z6ACYq5fxA');
      await Prefs.setWBS('https://muitvkotabekasi.com');
    }).onError((error, stackTrace) async{
      await Prefs.setFB('https://web.facebook.com/profile.php?id=100078059220710');
      await Prefs.setITG('https://www.instagram.com/muitvkotabekasi');
      await Prefs.setLAT('-7.008061745710969');
      await Prefs.setLONG('113.86021588190619');
      await Prefs.setPRIVACY('https://muitvkotabekasi.com/privacypolicy.html');
      await Prefs.setTWT('https://twitter.com/MUITVKOTABEKASI?t=aAcRhKozHc3RJOF6XeHYqA');
      await Prefs.setYTB('https://www.youtube.com/channel/UChi93oPQliOm8Z6ACYq5fxA');
      await Prefs.setWBS('https://muitvkotabekasi.com');
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        width: MediaQuery.of(context).size.width,
        height: MediaQuery.of(context).size.height,
        decoration: BoxDecoration(
          gradient: LinearGradient(
            begin: Alignment.topLeft,
            end: Alignment.bottomRight,
            colors: [HexColor('#8bc34a').withGreen(240), HexColor('#558b2f')],
            tileMode: TileMode.repeated,
          ),
        ),
        child: Stack(
          children: [
            SplashScreenView(
              navigateRoute: MyHomePage(),
              duration: 10000,
              imageSize: double.parse((MediaQuery.of(context).size.width * 0.4).toString()).toInt(),
              imageSrc: "images/ic_splass.png",
              text: "MUI-TV Kota Bekasi\n\n\n\n\n\n",
              textType: TextType.ColorizeAnimationText,
              textStyle: TextStyle(
                fontSize: 20.0,
                fontWeight: FontWeight.bold
              ),
              speed: 10,
              colors: [
                Colors.white,
                Colors.white
              ],
              backgroundColor: Colors.transparent,
            ),
            Align(
              alignment: Alignment.bottomCenter,
              child: Padding(
                padding: EdgeInsets.only(bottom: 10),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.end,
                  crossAxisAlignment: CrossAxisAlignment.center,
                  children: [
                    CircularProgressIndicator(
                      backgroundColor: Colors.green.shade800,
                    ),
                    SizedBox(height: 30),
                    Padding(
                      padding: EdgeInsets.only(left: 16, right: 13),
                      child: Text("Jl. Rawatembaga, RT 005 RW 002 Kel. Margajaya Kec. Bekasi Selatan, Kota Bekasi 17141",
                        style: TextStyle(color: Colors.white, fontWeight: FontWeight.w400), textAlign: TextAlign.center,),
                    ),
                    Padding(
                      padding: EdgeInsets.only(left: 16, right: 13),
                      child: Text("www.muitvkotabekasi.com",
                        style: TextStyle(color: Colors.white, fontWeight: FontWeight.w400), textAlign: TextAlign.center,),
                    ),
                    SizedBox(height: 15),
                  ],
                ),
              ),
            ),
          ],
        )
      )
    );
  }
}


class MyHomePage extends StatefulWidget {
  MyHomePage({Key key}) : super(key: key);

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  KFDrawerController _drawerController;

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    _drawerController = KFDrawerController(
      initialPage: ClassBuilder.fromString('Home'),
      items: [
        KFDrawerItem.initWithPage(
          page: Home(),
        ),
        KFDrawerItem.initWithPage(
          text: Text('Website', style: TextStyle(color: Colors.white, fontWeight: FontWeight.w700, fontSize: 17)),
          icon: Icon(FontAwesomeIcons.globe, color: Colors.white),
          page: WebUrlSite(url: 'https://muitvkotabekasi.com'),
        ),
        KFDrawerItem.initWithPage(
          text: Text('Youtube', style: TextStyle(color: Colors.white, fontWeight: FontWeight.w700, fontSize: 17)),
          icon: Icon(FontAwesomeIcons.youtube, color: Colors.white),
          page: WebUrlYoutobe(url: 'https://www.youtube.com/channel/UChi93oPQliOm8Z6ACYq5fxA',),
        ),
        KFDrawerItem.initWithPage(
          text: Text('Facebook', style: TextStyle(color: Colors.white,  fontWeight: FontWeight.w700, fontSize: 17)),
          icon: Icon(FontAwesomeIcons.facebook, color: Colors.white),
          page: WebUrlFacebook(url: 'https://web.facebook.com/profile.php?id=100078059220710',),
        ),
        KFDrawerItem.initWithPage(
          text: Text('Twitter', style: TextStyle(color: Colors.white, fontWeight: FontWeight.w700, fontSize: 17)),
          icon: Icon(FontAwesomeIcons.twitter, color: Colors.white),
          page: WebUrlTwitter(url: 'https://twitter.com/MUITVKOTABEKASI?t=aAcRhKozHc3RJOF6XeHYqA',),
        ),
        KFDrawerItem.initWithPage(
          text: Text('Instagram', style: TextStyle(color: Colors.white, fontWeight: FontWeight.w700, fontSize: 17)),
          icon: Icon(FontAwesomeIcons.instagram, color: Colors.white),
          page: WebUrlIntegram(url: 'https://www.instagram.com/muitvkotabekasi',),
        ),
        KFDrawerItem.initWithPage(
          text: Text('Maps', style: TextStyle(color: Colors.white, fontWeight: FontWeight.w700, fontSize: 17)),
          icon: Icon(FontAwesomeIcons.mapLocation, color: Colors.white),
          page: MyLocation(),
        ),
        KFDrawerItem.initWithPage(
          text: Text('Privacy Police', style: TextStyle(color: Colors.white, fontWeight: FontWeight.w700, fontSize: 17)),
          icon: Icon(Icons.privacy_tip_outlined, color: Colors.white),
          page: PrivacyPolice(url : 'https://muitvkotabekasi.com/privacypolicy.html'),
        ),
      ],
    );
  }

  @override
  Widget build(BuildContext context) {
    SystemChrome.setSystemUIOverlayStyle(SystemUiOverlayStyle(
        statusBarColor: HexColor('#7cb342')
    ));
    return Scaffold(
      body: Container(
        height: MediaQuery.of(context).size.height,
        width: MediaQuery.of(context).size.width,
        child: KFDrawer(
          controller: _drawerController,
          header: Align(
            alignment: Alignment.centerLeft,
            child: Container(
              padding: EdgeInsets.symmetric(horizontal: 16.0),
              margin: EdgeInsets.only(bottom: 30),
              width: MediaQuery.of(context).size.width * 0.6,
              child: InkWell(
                onTap: (){
                  _drawerController.page = _drawerController.items.where((element) => element.page == 'Home').toList().length>0?
                  _drawerController.items.where((element) => element.page == 'Home').toList()[0].page : _drawerController.items[0].page;
                  _drawerController.close();
                },
                child: Image.asset(
                  'images/ic_splass.png',
                  alignment: Alignment.centerLeft,
                ),
              )
            ),
          ),
          footer: Container(),
          decoration: BoxDecoration(
            gradient: LinearGradient(
              colors: [HexColor('#8bc34a').withGreen(230), HexColor('#558b2f')],
              begin: Alignment.topCenter,
              end: Alignment.bottomCenter,
              stops: [0.0, 1.0],tileMode: TileMode.repeated,),
          ),
        ),
      ),
    );
  }
}
