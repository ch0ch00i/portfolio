using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class drinkhp : MonoBehaviour {
	GameObject drink;
	GameObject racoon;
	// Use this for initialization
	void Start () { 
		this.drink = GameObject.Find("drink");
		this.racoon = GameObject.Find("racoon");
	}
	
	// Update is called once per frame
	void Update () {
		Vector2 p1 = this.drink.transform.position;
		Vector2 p2 = this.racoon.transform.position;

		Vector2 dir = p1 - p2;
		float d = dir.magnitude;

		float r1 = 0.5f;
		float r2 = 0.7f;

		if (d < r1 + r2) {
			

			GameObject director = GameObject.Find("gamedirector");
			director.GetComponent<gamedirecor> ().increasehp ();
			Destroy(gameObject);
		}
	}

}
