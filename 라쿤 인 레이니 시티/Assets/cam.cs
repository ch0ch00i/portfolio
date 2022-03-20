using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class cam : MonoBehaviour {

	public GameObject FollowTarget;

	void LateUpdate()
	{
		transform.position = 
			new Vector3(FollowTarget.transform.position.x,
				transform.position.y, transform.position.z);
	}

}

