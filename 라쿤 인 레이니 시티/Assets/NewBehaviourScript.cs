using System.Collections;
using System.Collections.Generic;
using UnityEngine;
[RequireComponent(typeof(Animator))
	public class NewBehaviourScript : MonoBehaviour {
		Animator AnimationController;
		SpriteRenderer SpriteController;
		Rigidbody2D rigid;

		void Start () {
			rigid = GetComponent<Rigidbody2D>();
			AnimationController = GetComponent<Animator>();
			SpriteController = GetComponent<SpriteRenderer>();
			StartCoroutine("Motion");
			StartCoroutine("Flip");
			StartCoroutine("move");
			StartCoroutine("jump");



			OnDamagedMotion = false;
			OnDamageMotion = false;
		}
		bool OnDamageMotion;
		bool OnDamagedMotion;
		//
		public void OnDamagedMotionClear()
		{
			OnDamagedMotion = false;
		}
			

		IEnumerator DamagedOption()
		{
			while(true)
			{
				
					if (OnDamagedMotion == false)
					{
						OnDamagedMotion = true;
						AnimationController.SetTrigger("OnDamaged");
					}
				
				yield return null;
			}
		}

		//
		IEnumerator jump()
		{
			while(true)
			{
				if(Input.GetKeyDown(KeyCode.UpArrow))
				{
					rigid.AddForce(new Vector2(0, 5), ForceMode2D.Impulse);
					yield return new WaitForSeconds(0.8f);
				}
				yield return null;
			}
		}
			

		IEnumerator move() {
			while (true) {
			if (OnDamagedMotion == false) {
				if (OnDamageMotion == false) {
					if (IsLeftCheck ()) {
						if (transform.localScale.x == -5) {
							transform.position = transform.position +
							new Vector3 (-1, 0, 0) * Time.deltaTime * 3.2f;
						} 
					}
					if (IsRightCheck ()) {
						if (transform.localScale.y == 5) {
							transform.position = transform.position +
							new Vector3 (1, 0, 0) * Time.deltaTime * 3.2f;
						}
					}
				}
			}
				yield return null;
			} 
		}	




		IEnumerator Flip()
		{
			while(true)
			{
				yield return new WaitUntil(IsLeftCheck);
				transform.localScale = new Vector3(-5, 5, 5);
				//SpriteController.flipX = true;
				yield return new WaitWhile(IsLeftCheck);

				yield return new WaitUntil(IsRightCheck);
				transform.localScale = new Vector3(5, 5, 5);
				//SpriteController.flipX = false;
				yield return new WaitWhile(IsRightCheck);
			}
		}

		bool IsLeftCheck()
		{
			return Input.GetKey(KeyCode.LeftArrow);
		}

		bool IsRightCheck()
		{
			return Input.GetKey(KeyCode.RightArrow);
		}

		bool IsMoveCheck()
		{
			if (OnDamageMotion == true)
				return false;
			if (Input.GetKey(KeyCode.LeftArrow))
				return true;
			if (Input.GetKey(KeyCode.RightArrow))
				return true;
			return false;
		}

		IEnumerator Motion()
		{
			while(true)
			{
				yield return new WaitUntil(IsMoveCheck);
				AnimationController.SetBool("iswalk", true);
				yield return new WaitWhile(IsMoveCheck);
				AnimationController.SetBool("iswalk", false);
			}
		}
	

		IEnumerator beattime(){
			int counttime = 0;

			while(counttime <6){
				if (counttime % 2 == 0) {
					SpriteController.color = new Color32 (255,255,255,90);
				}
				else{
					SpriteController.color = new Color32 (255, 255, 255, 180);
				}
				yield return new WaitForSeconds (0.2f);
				counttime++;
			}
			SpriteController.color = new Color32 (255,255,255,255);

			yield return null;
		}

		public void btime(){
			StartCoroutine ("beattime");
		}
	}
