using System;
using System.Collections;
using System.Collections.Generic;
using TMPro;
using UnityEngine;
using UnityEngine.Networking;

public class SolvedProgressPoints : MonoBehaviour
{
    [NonSerialized]
    public string Response;
    public TMP_Text Progress;
    int riddlesSolved = 0, riddlesTotal = 0;

    IEnumerator ieGetProgressPoints()
    {
        WWWForm dataForm = new WWWForm();
        dataForm.AddField("team", GameObject.Find("DataManager").GetComponent<DataManagement>().TeamName);
        dataForm.AddField("thunt", GameObject.Find("DataManager").GetComponent<DataManagement>().TreasureHuntName);
        string uri = "https://arthunt.000webhostapp.com/SolvedRiddles.php";

        UnityWebRequest webRequest = UnityWebRequest.Post(uri, dataForm);
        webRequest.chunkedTransfer = false;

        yield return webRequest.SendWebRequest();

        Response = webRequest.downloadHandler.text;

        string[] splitRaw = Response.Split('*');
        switch (webRequest.result)
        {
            case UnityWebRequest.Result.ConnectionError:
            case UnityWebRequest.Result.DataProcessingError:
                Debug.LogError(UnityWebRequest.Result.DataProcessingError);
                break;
            case UnityWebRequest.Result.ProtocolError:
                Debug.LogError(UnityWebRequest.Result.ProtocolError);
                break;
            case UnityWebRequest.Result.Success:

                Progress.text = splitRaw[0];
                var riddles = splitRaw[0].Split('/');
                riddlesSolved = int.Parse(riddles[0]);
                riddlesTotal = int.Parse(riddles[1]);
                GameObject.Find("Solved(Clone)/UI/Canvas/BluePanel/Responses/Points").GetComponent<TextMeshProUGUI>().text = "Points:  " + splitRaw[1];
              
                break;
        }
    }
    void Start()
    {
        StartCoroutine(ieGetProgressPoints());
    }

    // Update is called once per frame
    void Update()
    {
        
    }
}
