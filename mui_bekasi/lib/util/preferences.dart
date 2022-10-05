import 'package:shared_preferences/shared_preferences.dart';

class Preferences {
  static SharedPreferences prefs;

  static void setStringPref(String key, String value) {
    prefs.setString(key, value);
  }

  static String getStringPref(String key) {
    return prefs.getString(key).toString() ?? '';
  }

  Future<String> getStringAs(String key) async {
    return prefs.getString(key);
  }

  static void getKey() async {
    prefs = await SharedPreferences.getInstance();
  }
}

class PreferencesHelper {
  static Future<bool> getBool(String key) async {
    final p = await prefs;
    return p.getBool(key) ?? false;
  }

  static Future setBool(String key, bool value) async {
    final p = await prefs;
    return p.setBool(key, value);
  }

  static Future<int> getInt(String key) async {
    final p = await prefs;
    return p.getInt(key) ?? 0;
  }

  static Future setInt(String key, int value) async {
    final p = await prefs;
    return p.setInt(key, value);
  }

  static Future<String> getString(String key) async {
    final p = await prefs;
    return p.getString(key) ?? '';
  }

  static Future setString(String key, String value) async {
    final p = await prefs;
    return p.setString(key, value);
  }

  static Future<double> getDouble(String key) async {
    final p = await prefs;
    return p.getDouble(key) ?? 0.0;
  }

  static Future setDouble(String key, double value) async {
    final p = await prefs;
    return p.setDouble(key, value);
  }

  static Future<SharedPreferences> get prefs => SharedPreferences.getInstance();
}

class Prefs {
  static Future<String> get getFB =>
      PreferencesHelper.getString(Const.FACEBOOK);

  static Future setFB(String value) =>
      PreferencesHelper.setString(Const.FACEBOOK, value);

  static Future<String> get getYTB =>
      PreferencesHelper.getString(Const.YOUTUBE);

  static Future setYTB(String value) =>
      PreferencesHelper.setString(Const.YOUTUBE, value);

  static Future<String> get getITG =>
      PreferencesHelper.getString(Const.INSTAGRAM);

  static Future setITG(String value) =>
      PreferencesHelper.setString(Const.INSTAGRAM, value);

  static Future<String> get getTWT =>
      PreferencesHelper.getString(Const.TWITTER);

  static Future setTWT(String value) =>
      PreferencesHelper.setString(Const.TWITTER, value);

  static Future<String> get getLONG =>
      PreferencesHelper.getString(Const.LONG);

  static Future setLONG(String value) =>
      PreferencesHelper.setString(Const.LONG, value);

  static Future<String> get getLAT =>
      PreferencesHelper.getString(Const.LAT);

  static Future setLAT(String value) =>
      PreferencesHelper.setString(Const.LAT, value);

  static Future<String> get getPRIVACY =>
      PreferencesHelper.getString(Const.PRIVACY);

  static Future setPRIVACY(String value) =>
      PreferencesHelper.setString(Const.PRIVACY, value);

  static Future<String> get getWBS =>
      PreferencesHelper.getString(Const.WEBSITE);

  static Future setWBS(String value) =>
      PreferencesHelper.setString(Const.WEBSITE, value);
}

class Const {
  static const String FACEBOOK = 'facebook';
  static const String INSTAGRAM = 'instagram';
  static const String YOUTUBE = 'youtube';
  static const String TWITTER = 'twitter';
  static const String LONG = 'longitud';
  static const String LAT = 'latitud';
  static const String PRIVACY = 'policeprivasi';
  static const String WEBSITE = 'websitee';
}