using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
public class TIMER : MonoBehaviour {
    GameObject racoon;
    GameObject next;
    public float time;
    public float save;
    public Text text_timer;

    public void timer_() {
        time += Time.deltaTime;
        save = Mathf.Round(time);
        text_timer.text = "TIMER : " + save;

        Vector2 ra = this.racoon.transform.position;
        Vector2 ne = this.next.transform.position;
        if (ra == ne)
        {

        }
    }
    // Use this for initialization
    void Start () {
        this.racoon = GameObject.Find("racoon");
        this.next = GameObject.Find("next");
    }
	
	// Update is called once per frame
	void Update () {
        timer_();

    }

}
