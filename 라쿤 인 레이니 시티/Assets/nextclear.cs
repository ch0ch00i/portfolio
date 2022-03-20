using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;


public class nextclear : MonoBehaviour {
	GameObject racoon;
	GameObject clear;
    GameObject gameclear;
	// Use this for initialization
	void Start () {
		this.racoon = GameObject.Find("racoon");
		this.clear = GameObject.Find("clear");
       
    }
	
	// Update is called once per frame
	void Update () {
		Vector2 p1 = transform.position;
		Vector2 p2 = this.racoon.transform.position;


		Vector2 dir = p1 - p2;
		float d = dir.magnitude;

		float r1 = 0.5f;
		float r2 = 0.7f;

		if (d < r1 + r2) {

			Time.timeScale = 0.0f;
            
        }
        
    }
}
