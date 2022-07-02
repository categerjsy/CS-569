using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;

using System.IO;

public class GetQRCodes : MonoBehaviour
{
    // https://arthunt.000webhostapp.com/download2.php?path=qrcodes/005_file_4735c4cef32d8f4e05f3057d462b6760.png
    string loginResponseUsername;

    // Start is called before the first frame update
    void Start()
    {
        //loginResponseUsername = GameObject.Find("DataManager").GetComponent<DataManagement>().LoginResponseUsername;

        StartCoroutine(GetRequest("https://arthunt.000webhostapp.com/download2.php?path=qrcodes/riddle_629a69bb14d52f31a58822c0adf0fcd9.png"));
    }

    IEnumerator GetRequest(string uri)
    {
        using (UnityWebRequest webRequest = UnityWebRequest.Get(uri))
        {
            // Request and wait for the desired page.
            yield return webRequest.SendWebRequest();


            switch (webRequest.result)
            {
                case UnityWebRequest.Result.ConnectionError:
                case UnityWebRequest.Result.DataProcessingError:
                    Debug.LogError("Error: " + webRequest.error);
                    break;
                case UnityWebRequest.Result.ProtocolError:
                    Debug.LogError("HTTP Error: " + webRequest.error);
                    break;
                case UnityWebRequest.Result.Success:

                    var dataResponse = webRequest.downloadHandler.data;

                    File.WriteAllBytes(Application.dataPath + "/testQRFromServer.png", dataResponse);
                    break;
            }
        }
    }
}

