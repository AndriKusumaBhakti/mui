
import 'package:flutter/material.dart';

class Config extends InheritedWidget {
  Config({
    @required Widget child,
  }) : super(child: child);

  static bool isDebuging;
  static String currentUrl = "https://muitvkotabekasi.com/api";
  static int connectTimeout = 90000;
  static int receiveTimeout = 90000;

  static void log(String message) {
    if (isDebuging) {
      print(("LOG : ") + message.toString());
    }
  }

  void isDebug(bool debug) {
    isDebuging = debug;
  }

  @override
  bool updateShouldNotify(InheritedWidget oldWidget) => false;
}