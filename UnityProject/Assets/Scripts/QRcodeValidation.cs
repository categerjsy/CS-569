using UnityEngine;
using TMPro;
using UnityEngine.XR.ARFoundation;
using System.Collections;

public class QRcodeValidation : MonoBehaviour
{
    ARTrackedImageManager m_TrackedImageManager;

    [SerializeField]
    bool CorrectRiddle;
    [SerializeField]
    GameObject CorrectMsg;
    [SerializeField]
    GameObject WrongMsg;
    public TMP_Text debugText;
    public TMP_Text debugText2;
    public TMP_Text debugText3;

    [SerializeField]
    [Tooltip("Choose prefab to be spawned when QR is found")]
    GameObject prefab;

    [SerializeField]
    [Tooltip("to be replaced")]
    GameObject prefab2;


    public ArrayList riddles;
    void Awake()
    {
        m_TrackedImageManager = GetComponent<ARTrackedImageManager>();
    }
    void OnEnable()
    {
        m_TrackedImageManager.trackedImagesChanged += OnTrackedImagesChanged;
    }

    void OnDisable()
    {
        m_TrackedImageManager.trackedImagesChanged -= OnTrackedImagesChanged;
    }
    private void OnTrackedImagesChanged(ARTrackedImagesChangedEventArgs e)
    {
        ImageChangedHandle(e);
    }

    void ImageChangedHandle(ARTrackedImagesChangedEventArgs imgChangedArgs)
    {
        foreach (var item in imgChangedArgs.updated)
        {

            if (item.referenceImage.name == GameObject.Find("DataManager").GetComponent<DataManagement>().photoName)
            {
                string thuntIDfirst = item.referenceImage.name;

                // debugText.text = "thuntIDfirst";
                var thuntID = thuntIDfirst.Replace("riddle_t", "").Split('_');

                if (int.Parse(thuntID[0]) == GameObject.Find("DataManager").GetComponent<DataManagement>().TreasureHuntID)
                {
                    var riddleID = item.referenceImage.name.Replace("riddle_t", "").Replace(GameObject.Find("DataManager").GetComponent<DataManagement>().TreasureHuntID + "", "")
                 .Replace("_r", "");
                    //debugText.text = "id=" + riddleID;
                    GameObject.Find("ScanRiddlePage(Clone)").GetComponent<Solved>().cSolved(int.Parse(riddleID));
                    GameObject.Find("Dashboard(Clone)").GetComponent<GetProgressAndPoints>().cGetProgressPoints();
                riddles = GameObject.Find("DataManager").GetComponent<DataManagement>().Riddles;
                riddles.RemoveAt(0);

                GameObject.Find("DataManager").GetComponent<DataManagement>().Riddles = riddles;
                Riddle r = (Riddle)riddles[0];
                string FirstRiddle = r.getText();
                Debug.Log("First Text" + FirstRiddle);
                GameObject.Find("Dashboard(Clone)/UI/Canvas/BluePanel/Responses/Riddle").GetComponent<TextMeshProUGUI>().text = FirstRiddle;
                string FirstInfo = r.getInfo();
                GameObject.Find("Solved(Clone)/UI/Canvas/BluePanel/Responses/InfoText").GetComponent<TextMeshProUGUI>().text = FirstInfo;

                //isws prepei allagi
                string FirstPhoto = r.getPhoto();
                GameObject.Find("DataManager").GetComponent<DataManagement>().photoName = FirstPhoto;
                    //isws prepei allagi
                gameObject.transform.parent.gameObject.SetActive(false);
                }
                else
                {
                    GameObject.Find("ScanRiddlePage(Clone)").GetComponent<Solved>().ValidateQR();
                }
            }
        }
    }
    //ti tha ginei an scananro alli eikona
    
}
