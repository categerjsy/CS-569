using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;
using System.Linq;
using TMPro;


public class GoDashboard : MonoBehaviour
{
    public GameObject Dashboard;

    public void GoToDashboard()
    {

        GameObject.Find("Solved(Clone)").SetActive(false);
        Instantiate(Resources.Load("Prefabs/Dashboard"));
        GameObject.Find("ScanRiddlePage(Clone)").SetActive(false);
        GameObject.Find("Dashboard(Clone)").GetComponent<GetProgressAndPoints>().cGetProgressPoints();
        GameObject.Find("Dashboard(Clone)/UI/Canvas/BluePanel/Responses/Team Name").GetComponent<TextMeshProUGUI>().text = GameObject.Find("DataManager").GetComponent<DataManagement>().TeamName;
        
    }


}
