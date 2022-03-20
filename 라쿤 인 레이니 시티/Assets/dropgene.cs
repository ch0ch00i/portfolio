using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class dropgene : MonoBehaviour {

	public GameObject dropprefab;
	float span = 0.03f;
	float delta = 0;

    

	// Use this for initialization
	void Start () {
       
	}
	
	// Update is called once per frame
	void Update () {
		this.delta += Time.deltaTime;
		if (this.delta > this.span) {
			this.delta = 0;
			GameObject go = Instantiate(dropprefab) as GameObject;

			int px = Random.Range (10, 100);
			go.transform.position = new Vector3 (px, 7, 0);
            
        }
	}
}
