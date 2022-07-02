using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;
using System.Linq;
using TMPro;

public class ainte : MonoBehaviour
{
   
   public void llala()
    {
            Instantiate(Resources.Load("Prefabs/Solved") as GameObject);
        //na spawnnaretai s kalo simeio stin camera
        gameObject.transform.parent.gameObject.SetActive(false);
        // GameObject.Find("ScanRiddlePage(Cloned)").SetActive(false);
  
    }
}
