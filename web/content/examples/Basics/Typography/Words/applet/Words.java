import processing.core.*; 

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

public class Words extends PApplet {

/**
 * Words. 
 * 
 * The text() function is used for writing words to the screen. 
 * 
 * Created 15 January 2003
 * Updated 11 August 2008
 */


int x = 30;
PFont fontA;
  
public void setup() 
{
  size(200, 200);
  background(102);

  // Load the font. Fonts must be placed within the data 
  // directory of your sketch. Use Tools > Create Font 
  // to create a distributable bitmap font. 
  // For vector fonts, use the createFont() function. 
  fontA = loadFont("Ziggurat-HTF-Black-32.vlw");

  // Set the font and its size (in units of pixels)
  textFont(fontA, 32);

  // Only draw once
  noLoop();
}

public void draw() {
  // Use fill() to change the value or color of the text
  fill(0);
  text("ichi", x, 60);
  fill(51);
  text("ni", x, 95);
  fill(204);
  text("san", x, 130);
  fill(255);
  text("shi", x, 165);
}

  static public void main(String args[]) {
    PApplet.main(new String[] { "Words" });
  }
}