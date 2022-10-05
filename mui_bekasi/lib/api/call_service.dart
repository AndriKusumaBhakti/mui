
import 'dart:io';

import 'package:flutter/material.dart';
import 'package:mui_bekasi/api/config.dart';
import 'package:http/http.dart' as http;

Future<dynamic> getService(BuildContext context, String path) async {
  final Uri url = Uri.parse(Config.currentUrl + path);
  Map<String, String> headers = <String, String>{
    HttpHeaders.contentTypeHeader: 'application/x-www-form-urlencoded',
    'Accept-Language': 'ind',
  };
  try {
    final client = new http.Client();
    final response = await client
        .get(
      url,
      headers: headers
    )
        .timeout(Duration(seconds: Config.connectTimeout), onTimeout: () {
      throw ('Koneksi terputus. Silahkan coba lagi.');
    });
    Config.log('url : ' + url.toString());
    Config.log('Response : ' + response.body.toString());
    return response.body;
  } on SocketException {
    throw ('Tidak ada koneksi internet. Silahkan coba lagi|No internet connection, please try again.');
  }
}