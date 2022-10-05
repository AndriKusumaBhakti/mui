import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_image_slideshow/flutter_image_slideshow.dart';
import 'package:kf_drawer/kf_drawer.dart';
import 'package:mui_bekasi/api/call_service.dart';
import 'package:mui_bekasi/api/config.dart';
import 'package:mui_bekasi/util/convert_colors.dart';
import 'package:shimmer/shimmer.dart';
import 'package:youtube_player_flutter/youtube_player_flutter.dart';

class Home extends KFDrawerContent {
  Home({Key key});

  @override
  _MainPageState createState() => _MainPageState();
}

class _MainPageState extends State<Home> {
  String videoId = '';
  YoutubePlayerController _controller;
  bool cekLoading = false;
  dynamic response = null;

  @override
  void initState() {
    super.initState();
    service();
  }

  void service(){
    getService(context, '/method.php?method=liveStreaming').then((value){
      Map<String, dynamic> resp = Map<String, dynamic>.from(json.decode(value));
      if(resp['status'] && resp['result'] != null && resp['result'].length >0){
        response = value;
        videoId = YoutubePlayer.convertUrlToId(resp['result'][0]['link_channel']);
        _controller = YoutubePlayerController(
          initialVideoId: videoId,
          flags: YoutubePlayerFlags(
            autoPlay: false,
            mute: false,
            loop: true
          ),
        );
      }else{
        videoId = YoutubePlayer.convertUrlToId("https://www.youtube.com/watch?v=Ao5TAr3Ogc0");
        _controller = YoutubePlayerController(
          initialVideoId: videoId,
          flags: YoutubePlayerFlags(
            autoPlay: false,
            mute: false,
            loop: true
          ),
        );
      }
      cekLoading = true;
      setState(() {});
    }).catchError((error){
      videoId = YoutubePlayer.convertUrlToId("https://www.youtube.com/watch?v=Ao5TAr3Ogc0");
      _controller = YoutubePlayerController(
        initialVideoId: videoId,
        flags: YoutubePlayerFlags(
          autoPlay: false,
          mute: false,
          loop: true
        ),
      );
      cekLoading = true;
      setState(() {});
    }).onError((error, stackTrace) {
      videoId = YoutubePlayer.convertUrlToId("https://www.youtube.com/watch?v=Ao5TAr3Ogc0");
      _controller = YoutubePlayerController(
        initialVideoId: videoId,
        flags: YoutubePlayerFlags(
          autoPlay: false,
          mute: false,
          loop: true
        ),
      );
      cekLoading = true;
      setState(() {});
    });
  }

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: ListView(
        children: <Widget>[
          Column(
            children: <Widget>[
              Container(
                color: HexColor('#7cb342'),
                padding: EdgeInsets.only(top: 5, bottom: 5, left: 5),
                child: Row(
                  children: <Widget>[
                    ClipRRect(
                      borderRadius: BorderRadius.all(Radius.circular(32.0)),
                      child: Material(
                        shadowColor: Colors.transparent,
                        color: Colors.transparent,
                        child: Row(
                          children: [
                            IconButton(
                              icon: Icon(
                                Icons.menu,
                                color: Colors.white,
                              ),
                              onPressed: widget.onMenuPressed,
                            ),
                          ],
                        )
                      ),
                    ),
                    Text("Home", style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold, color: Colors.white), textAlign: TextAlign.center,),
                    Spacer(),
                    InkWell(
                      child: Container(
                        height: 40,
                        width: 40,
                        alignment: Alignment.center,
                        decoration: BoxDecoration(
                            borderRadius: BorderRadius.circular(20),
                            image: DecorationImage(
                                image: AssetImage('images/ic_logo.jpg'),
                                fit: BoxFit.cover)),
                      ),
                      onTap: (){
                        return Home();
                      },
                    ),
                    SizedBox(width: 15)
                  ],
                ),
              ),
              Padding(
                padding: EdgeInsets.all(16),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    (cekLoading)?YoutubePlayer(
                      controller: _controller,
                      showVideoProgressIndicator: true,
                      onReady: (){
                        print('READY');
                      },
                      bottomActions: [
                        CurrentPosition(),
                        ProgressBar(
                          isExpanded: true,
                          colors: ProgressBarColors(
                            playedColor: Colors.amber,
                            handleColor: Colors.amberAccent,
                          ),
                        ),
                        const PlaybackSpeedButton(),
                      ],
                    ):_loadingView(),
                    SizedBox(height: 15),
                    Row(
                      children: <Widget>[
                        Text("MUI TV KOTA BEKASI", style: TextStyle(fontSize: 17, fontWeight: FontWeight.bold)),
                      ],
                    ),
                    SizedBox(height: 15),
                    Text("MUI-TV Kota Bekasi merupakan gabungan dua kata yang terdiri dari kata MUI-TV adalah singkatan dari Majelis Ulama "
                        "Indonesia Televisi dan kata Kota Bekasi yang merupakan nama kota tempat MUI-TV itu berkantor. MUI-TV Kota Bekasi "
                        "adalah sebuah stasiun televisi nasional yang mulai mengudara melalui channel Youtube pada tanggal 23 bulan Februari "
                        "tahun 2022 dan resmi diluncurkan pada 26 Februari 2022.", style: TextStyle(color: Colors.grey),),
                    SizedBox(height: 15),
                    Row(
                      children: <Widget>[
                        Text("Alamat", style: TextStyle(fontSize: 17, fontWeight: FontWeight.bold)),
                      ],
                    ),
                    SizedBox(height: 15),
                    Text("Jl. Rawatembaga, RT 005 RW 002 Kel. Margajaya Kec. Bekasi Selatan, Kota Bekasi 17141", style: TextStyle(color: Colors.grey),),
                    SizedBox(height: 15),
                    Row(
                      children: <Widget>[
                        Text("Email", style: TextStyle(fontSize: 17, fontWeight: FontWeight.bold)),
                      ],
                    ),
                    SizedBox(height: 15),
                    Text("muikotabekasi26@gmail.com", style: TextStyle(color: Colors.grey),),
                    SizedBox(height: 15),
                    ImageSlideshow(
                      indicatorColor: Colors.blue,
                      onPageChanged: (value) {

                      },
                      autoPlayInterval: 15000,
                      isLoop: true,
                      children: [
                        Image.asset(
                          'images/activitas/ic_home_1.jpg',
                          fit: BoxFit.cover,
                        ),
                        Image.asset(
                          'images/activitas/ic_home_2.jpg',
                          fit: BoxFit.cover,
                        ),
                        Image.asset(
                          'images/activitas/ic_home_3.jpg',
                          fit: BoxFit.cover,
                        ),
                        Image.asset(
                          'images/activitas/ic_home_4.jpg',
                          fit: BoxFit.cover,
                        ),
                      ],
                    ),
                  ],
                ),
              ),
            ],
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
              2,
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