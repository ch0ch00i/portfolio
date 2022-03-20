using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class gamedirecor : MonoBehaviour {
	GameObject hpgage;
    GameObject racoon;
    GameObject next;
    // Use this for initialization
    public int i = 10;
    void Start () {
		this.hpgage = GameObject.Find("hpgage");
        this.racoon = GameObject.Find("racoon");
        this.next = GameObject.Find("next");
    }
 
    IEnumerator delay()
    {
        yield return new WaitForSeconds(5f);
    }
    public void decreasehp(){
        
        this.hpgage.GetComponent<Image>().fillAmount -= 0.1f;
        i --;
        print(i);
        /*
        bool isPaused = false;
        Vector2 ra = this.racoon.transform.position;
        Vector2 ne = this.next.transform.position;
        if (ra == ne)
        {
            isPaused = true;
        }
        //*/
    }
    
    public void increasehp(){
		this.hpgage.GetComponent<Image> ().fillAmount += 0.2f;
        i=i+2;
        print(i);
    }

    // Update is called once per frame
    void Update()
    {
     
    }
}
