import processing.core.*; 
import processing.xml.*; 

import java.applet.*; 
import java.awt.*; 
import java.awt.image.*; 
import java.awt.event.*; 
import java.io.*; 
import java.net.*; 
import java.text.*; 
import java.util.*; 
import java.util.zip.*; 
import java.util.regex.*; 

public class GettingStarted_Shape extends PApplet {

/**
 * Getting Started SVG. 
 * Illustration by George Brower. 
 * 
 * The loadShape() command is used to read simple SVG (Scalable Vector Graphics)
 * files into a Processing sketch. This library was specifically tested under
 * SVG files created from Adobe Illustrator. For now, we can't guarantee that 
 * it'll work for SVGs created with anything else. 
 */

PShape bot;

public void setup() {
  size(640, 360);
  smooth();
  // The file "bot1.svg" must be in the data folder
  // of the current sketch to load successfully
  bot = loadShape("bot1.svg");
  noLoop(); // Only run draw() once
} 

public void draw(){
  background(102);
  shape(bot, 110, 90, 100, 100);  // Draw at coordinate (10, 10) at size 100 x 100
  shape(bot, 280, 40);            // Draw at coordinate (70, 60) at the default size
}

  static public void main(String args[]) {
    PApplet.main(new String[] { "GettingStarted_Shape" });
  }
}
