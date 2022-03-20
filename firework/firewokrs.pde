import ddf.minim.signals.*;
import ddf.minim.*;
import ddf.minim.analysis.*;
import ddf.minim.effects.*;
PImage img;
import ddf.minim.*;

Minim minim;
AudioPlayer song;
BeatDetect beat;
BeatListener bl;
ArrayList balls = new ArrayList();

void setup()
{
  size(displayWidth,displayHeight,P3D);
  minim = new Minim(this);
  frameRate(50);  //30
  smooth();
  song = minim.loadFile("short0.mp3",2048);
  song.loop();
  
  beat = new BeatDetect(song.bufferSize(), song.sampleRate());
  beat.setSensitivity(0);
  bl = new BeatListener(beat, song);
  noStroke();
  }
  
  void draw()
  {
  //fill(145);
  //rect(0,0,width,height);

  img= loadImage("sky0.png");
  image(img,0,0,displayWidth,displayHeight);

  boolean kick = beat.isKick();
  boolean hat = beat.isHat();
  boolean snare = beat.isSnare();
  if(beat.isRange(5,16,2)) //5 15 2
  {
    color col = color(random(255), random(255),random(255));
    for(int j=0; j<abs(song.mix.level()*6);j++)
    {
      float y = random(height-440);
      float x = random(width);
      for(int i=0; i<=abs(song.mix.level()*100);i++)
      {
        balls.add(new Ball(x,y,song.mix.get(0)*40,col));
      }
    }
  }
  for(int i=0; i<balls.size();i++)
  {
    Ball b = (Ball)balls.get(i);
    b.update();
    if(!b.alive)
    {
      balls.remove(b);
      i--;
    }
  }    
 }
 
 void stop()
 {
   song.close();
   minim.stop();
   super.stop();
 }
 
 public class Ball
 {
   PVector loc = new PVector();
   PVector speed = new PVector(random(-2,2), random(-2,2));//
   color col;
   boolean alive = true;
   int age = 0;
   
   public Ball(float x, float y, float mag, color col)
   {
     loc.x=x;
     loc.y=y;
     speed.normalize();
     speed.mult(mag);
     this.col = col;
   }
   
   public void update()
   {
   age +=6; //1
   speed.y += .5;
   loc.add(speed);
   if(loc.y>height || age>=105)//255 = 100
     alive=false;
     fill(red(col), blue(col), green(col), 255-age);
     ellipse(loc.x, loc.y, 5,5);
   }
  }
  
 class BeatListener implements AudioListener
  {
  private BeatDetect beat;
  private AudioPlayer source;
    
    BeatListener(BeatDetect beat, AudioPlayer source)
    {
    this.source = source;
    this.source.addListener(this);
    this.beat = beat;
    }
    void samples(float[] samps)
    {
      beat.detect(source.mix);
    }
    
    void samples(float[] sampsL, float[] sampsR)
    {
    beat.detect(source.mix); 
    }
  }