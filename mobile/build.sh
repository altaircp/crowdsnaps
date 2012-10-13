#!/bin/bash
java -jar yuicompressor-2.4.7.jar --type js js/webworks-1.0.2.9.js > js/application-min.js;
java -jar yuicompressor-2.4.7.jar --type js js/jquery-1.8.1.min.js >> js/application-min.js;
java -jar yuicompressor-2.4.7.jar --type js js/main.js >> js/application-min.js;
java -jar yuicompressor-2.4.7.jar --type css css/bbui-0.9.4.css > css/application-min.css;
