using UnityEngine;
using UnityEngine.UI;
using UnityEngine.XR.ARSubsystems;
using UnityEngine.XR.ARFoundation;
using System.Collections.Generic;
using System.Linq;
using System.Collections;
using Unity.Jobs;
using TMPro;
using System;

public class RuntimeQRCodes : MonoBehaviour
{
    ARTrackedImageManager m_TrackedImageManager;
    IReferenceImageLibrary m_ImageLibrary;

    [SerializeField]
    bool CorrectRiddle;

    [SerializeField]
    GameObject CorrectMsg;
    [SerializeField]
    GameObject WrongMsg;

    public TMP_Text debugText;
    public TMP_Text debugText2;
    public TMP_Text debugText3;
    public TMP_Text debugText4;
    public TMP_Text debugText5;
    public TMP_Text debugText6;
    public TMP_Text debugText7;

    [SerializeField]
    public class ImageData
    {
        [SerializeField, Tooltip("The source texture for the image. Must be marked as readable.")]
        Texture2D m_Texture= new Texture2D(128, 128, TextureFormat.RGB24, false);
        public Texture2D texture
        {
            get => m_Texture;
            set => m_Texture = value;
        
        }

        [SerializeField, Tooltip("The name for this image.")]
        string m_Name;

        public string name
        {
            get => m_Name;
            set => m_Name = value;
        }

        [SerializeField, Tooltip("The width, in meters, of the image in the real world.")]
        float m_Width;

        public float width
        {
            get => m_Width;
            set => m_Width = value;
        }
       // public AddReferenceImageJobState jobState { get; set; }
    }
    [SerializeField, Tooltip("The set of images to add to the image library at runtime")]
    ImageData[] m_Images;
    void Start()
    {
        m_TrackedImageManager = GameObject.Find("AR Foundation/AR Session Origin").GetComponent<ARTrackedImageManager>();
        m_ImageLibrary = GetComponent<ARTrackedImageManager>().referenceLibrary;
    }
    //Get which images tracked
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
    //    UpdateTrackedImages(e.added);
    //    UpdateTrackedImages(e.updated);
        foreach (var trackedImage in e.added)
        {
            debugText.text = trackedImage.referenceImage.name;
            // Give the initial image a reasonable default scale
        }
    }
    private void UpdateTrackedImages(IEnumerable<ARTrackedImage> trackedImages)
    {
        
           var trackedImage =
            trackedImages.FirstOrDefault(x => x.referenceImage.name == "qr2");
         debugText2.text = "exo";
        var trackedImage2 =
            trackedImages.FirstOrDefault(x => x.referenceImage.name == "testQRFromServer");


        if (trackedImage)
        {
            //check apo tin vasi an einai correct
            CorrectMsg.SetActive(true);
            WrongMsg.SetActive(false);
            debugText.text = "ALLILOUIA";
        }
        if (trackedImage2)
        {
            WrongMsg.SetActive(true);
            CorrectMsg.SetActive(false);
        }
        //if (trackedImage3)
        //{
        //    CorrectMsg.SetActive(true);
        //    WrongMsg.SetActive(true);

        //}

    }
}
