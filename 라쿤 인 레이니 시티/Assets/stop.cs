using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class stop : MonoBehaviour {
	GameObject racoon;
	GameObject dropgene;
	void Start () {
		this.racoon = GameObject.Find("racoon");
		this.dropgene = GameObject.Find("dropgene");
	}
	// Update is called once per frame
	void Update () {
		if (Input.GetKey (KeyCode.Escape)) {
			if (Time.timeScale == 0.0f) {
				Time.timeScale = 1.0f;
			} else {
				Time.timeScale = 0.0f;
			}
	}
}
}