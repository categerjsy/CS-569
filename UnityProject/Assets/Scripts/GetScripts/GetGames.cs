using System.Collections;
using TMPro;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;

public class GetGames : MonoBehaviour
{
    public GameObject GameContainer;
    public GameObject GameTemplate;
    public TMP_Text debugText, debugText2;

    string loginResponseUsername;

    // Start is called before the first frame update
    void Start()
    {
        loginResponseUsername = GameObject.Find("DataManager").GetComponent<DataManagement>().LoginResponseUsername;

       StartCoroutine(GetRequest("https://arthunt.000webhostapp.com/Game.php?username="+ loginResponseUsername));
        //debugText = GameObject.Find("Canvas/Text (TMP)").GetComponent<TextMeshProUGUI>();
        //debugText2 = GameObject.Find("Canvas/Text (TMP) (1)").GetComponent<TextMeshProUGUI>();

    }

    IEnumerator GetRequest(string uri)
    {
        using (UnityWebRequest webRequest = UnityWebRequest.Get(uri))
        {
            // Request and wait for the desired page.
            yield return webRequest.SendWebRequest();

            string[] pages = uri.Split('/');
            int page = pages.Length - 1;
            switch (webRequest.result)
            {
                case UnityWebRequest.Result.ConnectionError:
                case UnityWebRequest.Result.DataProcessingError:
                    Debug.LogError(pages[page] + ": Error: " + webRequest.error);
                    break;
                case UnityWebRequest.Result.ProtocolError:
                    Debug.LogError(pages[page] + ": HTTP Error: " + webRequest.error);
                    break;
                case UnityWebRequest.Result.Success:
                    string rawResponse = webRequest.downloadHandler.text;
                   
                    string[] games = rawResponse.Split('*');

                    if (games.Length==1)
                    {
                        GameTemplate.transform.Find("Text").gameObject.GetComponent<TextMeshProUGUI>().text = "There are no available games";
                        GameTemplate.transform.Find("Button").gameObject.SetActive(false);
                        break;
                    }
                    else
                    {
                       // debugText2.text = "edo" +games.Length;
                        //debugText2.text = "edo" +games.Length;
                        foreach (string i in games)
                        {
                            if (i != "")
                            {
                                GameObject ga = Instantiate(GameTemplate,GameContainer.transform);
                                ga.GetComponent<Transform>().localScale = new Vector3(1, 1, 1);
                                ga.GetComponent<GameName>().game.text = i;
                                ga.name = i;
                            }
                        }
                        GameTemplate.SetActive(false);

                    }
                    break;
            }
        }
    }
}
