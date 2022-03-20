using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class drop : MonoBehaviour {
	GameObject racoon;
	GameObject tile00;
    GameObject next;
    GameObject gameclear;

    // Use this for initialization
    void Start () {
		this.racoon = GameObject.Find("racoon");
		this.tile00 = GameObject.Find("tile00");
        this.next = GameObject.Find("next");
    } 
		

	// Update is called once per frame
	void Update () {
		transform.Translate (0, -0.1f, 0);

		if (transform.position.y < -5.0f) {
			Destroy(gameObject);
		}

		Vector2 p1 = transform.position;
		Vector2 p2 = this.racoon.transform.position;
		Vector2 p3 = this.tile00.transform.position;
        Vector2 p4 = this.next.transform.position;

        if (p2 == p4)
        {
            Destroy(gameObject);
        }

        Vector2 dir = p1 - p2;
		float d = dir.magnitude;

		Vector2 dir2 = p1 - p3;
		float d2 = dir2.magnitude;


		float r1 = 0.5f;	//빗방울
		float r2 = 0.7f;	//라쿤


		if (d < r1 + r2) {
			Destroy(gameObject);
			GameObject director = GameObject.Find("gamedirector");
			director.GetComponent<gamedirecor> ().decreasehp ();

          

            //director.GetComponent<NewBehaviourScript>().decreasehp();
            racoon.GetComponent<NewBehaviourScript> ().btime();
            

		}

		if (d2 < r1 + r2) {
           Destroy (gameObject);

        }

  

		/*
		if(racoon.GetComponent<NewBehaviourScript> ().btime()=true){
			director.GetComponent<gamedirecor> ().decreasehp () = false;
		}
		//*/

	}
}
