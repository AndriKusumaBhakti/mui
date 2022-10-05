import 'package:mui_bekasi/home.dart';
import 'package:mui_bekasi/my_location.dart';
import 'package:mui_bekasi/privasi_police.dart';
import 'package:mui_bekasi/web_url_facebook.dart';
import 'package:mui_bekasi/web_url_instagram.dart';
import 'package:mui_bekasi/web_url_site.dart';
import 'package:mui_bekasi/web_url_twitter.dart';
import 'package:mui_bekasi/web_url_youtobe.dart';

typedef T Constructor<T>();

final Map<String, Constructor<Object>> _constructors = <String, Constructor<Object>>{};

void register<T>(Constructor<T> constructor) {
  _constructors[T.toString()] = constructor as Constructor<Object>;
}

class ClassBuilder {
  static void registerClasses() {
    register<Home>(() => Home());
    register<PrivacyPolice>(() => PrivacyPolice(url : 'https://muitvkotabekasi.com//privacypolicy.html'));
    register<MyLocation>(() => MyLocation());
    register<WebUrlYoutobe>(() => WebUrlYoutobe(url: 'https://www.youtube.com/channel/UChi93oPQliOm8Z6ACYq5fxA',));
    register<WebUrlFacebook>(() => WebUrlFacebook(url: 'https://web.facebook.com/profile.php?id=100078059220710&_rdc=1&_rdr',));
    register<WebUrlIntegram>(() => WebUrlIntegram(url: 'https://www.instagram.com/muitvkotabekasi/?utm_medium=copy_link',));
    register<WebUrlTwitter>(() => WebUrlTwitter(url: 'https://twitter.com/MUITVKOTABEKASI?t=aAcRhKozHc3RJOF6XeHYqA&s=08',));
    register<WebUrlSite>(() => WebUrlSite(url: 'https://muitvkotabekasi.com/',));
  }

  static dynamic fromString(String type) {
    if (_constructors[type] != null) return _constructors[type]();
  }
}