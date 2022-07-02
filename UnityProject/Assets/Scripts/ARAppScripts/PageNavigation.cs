using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.XR.ARFoundation;
using UnityEngine.XR.ARSubsystems;

public class PageNavigation : MonoBehaviour
{
    public GameObject ScanRiddlePage;
   // public GameObject ARFoundation;
    public void GoToScanRiddlePage()
    {
        Instantiate(ScanRiddlePage);
        //if(Resources.Load("Prefabs/AR Foundation"))
        //{
        //    Instantiate(Resources.Load("Prefabs/AR Foundation") as GameObject).name= "AR Foundation";
        //}
        gameObject.SetActive(false);
    }   
}
