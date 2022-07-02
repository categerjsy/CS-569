using System.Collections;
using UnityEngine;
using UnityEngine.Networking;
using TMPro;

public class SendGameName : MonoBehaviour
{
    public string GameName;
    int GameID;
    public string TeamName;

    public void SelectGame(GameObject gameName)
    {
        GameName = gameName.ToString().Replace(" (UnityEngine.GameObject)", "");
        StartCoroutine(PostGameName());
        Instantiate(Resources.Load("Prefabs/Dashboard") as GameObject);
    }

    IEnumerator PostGameName()
    {
        WWWForm dataForm = new WWWForm();
        dataForm.AddField("name", GameName);
        GameObject.Find("DataManager").GetComponent<DataManagement>().TreasureHuntName = GameName;
        dataForm.AddField("user", GameObject.Find("DataManager").GetComponent<DataManagement>().LoginResponseUsername);
       
        string uri = "https://arthunt.000webhostapp.com/ReturnThuntIdAndTeam.php";

        UnityWebRequest webRequest = UnityWebRequest.Post(uri, dataForm);
        webRequest.chunkedTransfer = false;

        yield return webRequest.SendWebRequest();

        var returnedValues = webRequest.downloadHandler.text;
        string[] values = returnedValues.Split('*');

        if (values[1] != "-1" && values[3] != "-1")
        {
            GameID = int.Parse(values[1]);
            GameObject.Find("DataManager").GetComponent<DataManagement>().TreasureHuntID = GameID;

            TeamName = values[3];
            GameObject.Find("DataManager").GetComponent<DataManagement>().TeamName = TeamName;
        }
        else
        {
            Debug.Log("not komple" + values[1]);
            Debug.Log("not komple" + values[3]);
            //minima lathous
            //exception isos
        }
        GameObject.Find("DataManager").GetComponent<DataManagement>().TreasureHuntID = int.Parse(values[1]);
        GameObject.Find("DataManager").GetComponent<DataManagement>().TeamName = values[3];
        GameObject.Find("Dashboard(Clone)/UI/Canvas/BluePanel/Responses/Team Name").GetComponent<TextMeshProUGUI>().text = values[3];
        GameObject.Find("Dashboard(Clone)").GetComponent<GetProgressAndPoints>().cGetProgressPoints();
        gameObject.transform.parent.gameObject.SetActive(false);

       // GameObject.Find("DataManager").GetComponent<DataManagement>().TreasureHuntID = int.Parse(values[1]);
       // GameObject.Find("DataManager").GetComponent<DataManagement>().TreasureHuntID = int.Parse(values[1]);
    }
}
