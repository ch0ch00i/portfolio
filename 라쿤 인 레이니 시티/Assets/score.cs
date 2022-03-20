using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class score : MonoBehaviour {
    public float final_score;
    public Text text_score;
    GameObject racoon;
    GameObject next;
    GameObject timer;

    public void score_()
    {


    }
    // Use this for initialization
    void Start () {


    }
	
	// Update is called once per frame
	void Update () {


        TIMER timer = GameObject.Find("Timer").GetComponent<TIMER>();
        //timer.save=timer.save;
        gamedirecor gamedi = GameObject.Find("gamedirector").GetComponent<gamedirecor>();
        final_score = (500 - timer.save) + 5 * (gamedi.i);
        //gamedi.i 
        text_score.text = " " + final_score;
        
        this.racoon = GameObject.Find("racoon");
        this.next = GameObject.Find("next");


        Vector2 p1 = this.next.transform.position;
        Vector2 p2 = this.racoon.transform.position;


        Vector2 dir = p1 - p2;
        float d = dir.magnitude;

        float r1 = 0.5f;
        float r2 = 0.7f;

        if (d < r1 + r2)
        {
            print(final_score);
            
        }
    }
}
